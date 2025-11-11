<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class QuickBookController extends Controller
{
    public function index()
    {
        $list_laboratorium = Laboratorium::all();
        return view('pages.quickbook', compact('list_laboratorium'));
    }

    public function search(Request $request)
    {
        try {
            $tanggal = $request->input('tanggal');
            $labName = $request->input('lab_name');
            $timeSlot = $request->input('time_slot');

            // Cek jika tanggal kosong
            if (empty($tanggal)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tanggal harus dipilih.',
                    'data' => []
                ], 422);
            }

            // Validasi tanggal tidak boleh kurang dari hari ini
            $today = Carbon::today();
            $selectedDate = Carbon::parse($tanggal);

            if ($selectedDate->lt($today)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tanggal peminjaman tidak boleh kurang dari hari ini.',
                    'data' => []
                ], 422);
            }

            // Lanjutkan query laboratorium seperti sebelumnya...
            $query = Laboratorium::query();

            if (!empty($labName) && $labName !== "") {
                $query->where('id_laboratorium', $labName);
            }

            $labs = $query->get();


            // Jika tidak ada tanggal yang dipilih
            if (empty($tanggal)) {
                $result = $labs->map(function ($lab) {
                    return [
                        'id_laboratorium' => $lab->id_laboratorium,
                        'nama_laboratorium' => $lab->nama_laboratorium,
                        'lokasi' => $lab->lokasi,
                        'kapasitas' => $lab->kapasitas,
                        'deskripsi' => $lab->deskripsi,
                        'status' => 'Pilih tanggal untuk melihat ketersediaan',
                        'luas' => $lab->luas,
                        'waktu_tersedia' => '-',
                        'status_color' => 'default',
                        'waktu_slot' => '-'
                    ];
                });

                return response()->json([
                    'success' => true,
                    'data' => $result,
                ]);
            }

            // Define time slots
            $timeSlots = [
                ['08:00', '10:00'],
                ['10:00', '12:00'],
                ['12:00', '14:00'],
                ['14:00', '16:00'],
                ['16:00', '18:00'],
            ];

            $result = [];

            foreach ($labs as $lab) {
                foreach ($timeSlots as $slot) {
                    [$startTime, $endTime] = $slot;
                    $waktuSlot = $startTime . ' - ' . $endTime;

                    // Check if lab is booked for this time slot - PERBAIKAN QUERY
                    $isBooked = Peminjaman::where('id_laboratorium', $lab->id_laboratorium)
                        ->whereDate('tanggal', $tanggal)
                        ->where(function ($query) use ($startTime, $endTime) {
                            $query->where(function ($q) use ($startTime, $endTime) {
                                // Cek tabrakan waktu: 
                                // Jika peminjaman mulai sebelum slot berakhir DAN selesai setelah slot mulai
                                $q->where('jam_mulai', '<', $endTime)
                                    ->where('jam_selesai', '>', $startTime);
                            });
                        })
                        ->whereIn('status', ['approved', 'pending', 'rejected', 'done'])
                        ->exists();

                    $isAvailable = !$isBooked;

                    // DEBUG: Log untuk setiap slot
                    \Log::info('Slot Availability Check:', [
                        'lab' => $lab->nama_laboratorium,
                        'tanggal' => $tanggal,
                        'slot' => $waktuSlot,
                        'isBooked' => $isBooked,
                        'isAvailable' => $isAvailable
                    ]);

                    // Hanya tambahkan ke hasil jika tersedia
                    if ($isAvailable) {
                        $result[] = [
                            'id_laboratorium' => $lab->id_laboratorium,
                            'nama_laboratorium' => $lab->nama_laboratorium,
                            'lokasi' => $lab->lokasi,
                            'kapasitas' => $lab->kapasitas,
                            'deskripsi' => $lab->deskripsi,
                            'luas' => $lab->luas,
                            'status' => 'Tersedia',
                            'status_color' => 'available',
                            'waktu_tersedia' => $waktuSlot,
                            'waktu_slot' => $waktuSlot,
                            'jam_mulai' => $startTime,
                            'jam_selesai' => $endTime
                        ];
                    }
                }
            }

            \Log::info('QuickBook Search Result:', [
                'count' => count($result),
                'result_labs' => array_map(function ($item) {
                    return $item['nama_laboratorium'] . ' - ' . $item['waktu_slot'];
                }, $result)
            ]);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (\Exception $e) {
            \Log::error('QuickBook Search Error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
}
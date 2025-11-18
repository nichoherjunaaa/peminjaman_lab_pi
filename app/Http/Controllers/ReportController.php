<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Data laboratorium untuk filter
        $laboratoriums = Laboratorium::all();

        // Apply filters
        $query = Peminjaman::with('laboratorium', 'user')
            ->select('peminjaman.*');

        // Filter periode
        $filter = $request->get('filter', 'monthly');
        $this->applyDateFilter($query, $filter);

        // Filter laboratorium - PERBAIKAN: specify table
        if ($request->has('id_laboratorium') && $request->id_laboratorium != 'all') {
            $query->where('peminjaman.id_laboratorium', $request->id_laboratorium);
        }

        // Filter status
        if ($request->has('status') && $request->status != 'all') {
            $statusMap = [
                'approved' => 'approved',
                'pending' => 'pending',
                'rejected' => 'rejected',
                'completed' => 'done'
            ];
            $query->where('peminjaman.status', $statusMap[$request->status]);
        }

        // Get data untuk statistik
        $peminjaman_count = $query->count();

        // Data untuk charts
        $monthlyData = $this->getMonthlyData($filter);
        $labDistribution = $this->getLabDistribution($filter, $request);
        $statusDistribution = $this->getStatusDistribution($filter, $request);
        $dayOfWeekData = $this->getDayOfWeekData($filter, $request);

        // Data untuk cards
        $popularLab = $this->getPopularLab($filter, $request);
        $popularTime = $this->getPopularTime($filter, $request);
        $usageRate = $this->getUsageRate($filter, $request);

        // Data untuk tabel
        $peminjamanData = $query->orderBy('peminjaman.tanggal', 'desc')
            ->orderBy('peminjaman.jam_mulai', 'desc')
            ->paginate(10);

        return view('pages.report', compact(
            'laboratoriums',
            'peminjaman_count',
            'monthlyData',
            'labDistribution',
            'statusDistribution',
            'dayOfWeekData',
            'popularLab',
            'popularTime',
            'usageRate',
            'peminjamanData'
        ));
    }

    private function applyDateFilter($query, $filter)
    {
        $now = Carbon::now();

        switch ($filter) {
            case 'weekly':
                $query->whereBetween('peminjaman.tanggal', [
                    $now->startOfWeek()->format('Y-m-d'),
                    $now->endOfWeek()->format('Y-m-d')
                ]);
                break;
            case 'monthly':
                $query->whereBetween('peminjaman.tanggal', [
                    $now->startOfMonth()->format('Y-m-d'),
                    $now->endOfMonth()->format('Y-m-d')
                ]);
                break;
            case '3months':
                $query->whereBetween('peminjaman.tanggal', [
                    $now->copy()->subMonths(3)->format('Y-m-d'),
                    $now->format('Y-m-d')
                ]);
                break;
            case '6months':
                $query->whereBetween('peminjaman.tanggal', [
                    $now->copy()->subMonths(6)->format('Y-m-d'),
                    $now->format('Y-m-d')
                ]);
                break;
            case 'yearly':
                $query->whereBetween('peminjaman.tanggal', [
                    $now->startOfYear()->format('Y-m-d'),
                    $now->endOfYear()->format('Y-m-d')
                ]);
                break;
        }
    }

    private function getMonthlyData($filter)
    {
        $query = Peminjaman::select(
            DB::raw('MONTH(peminjaman.tanggal) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('month')
            ->orderBy('month');

        $this->applyDateFilter($query, $filter);

        $data = $query->get();

        // Format data untuk chart
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $monthlyData = array_fill(0, 12, 0);

        foreach ($data as $item) {
            $monthlyData[$item->month - 1] = $item->count;
        }

        return $monthlyData;
    }

    private function getLabDistribution($filter, $request)
    {
        $query = Peminjaman::join('laboratorium', 'peminjaman.id_laboratorium', '=', 'laboratorium.id_laboratorium')
            ->select(
                'laboratorium.nama_laboratorium',
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('laboratorium.nama_laboratorium', 'laboratorium.id_laboratorium')
            ->orderBy('count', 'desc');

        $this->applyDateFilter($query, $filter);

        // PERBAIKAN: Specify table untuk filter laboratorium
        if ($request->has('id_laboratorium') && $request->id_laboratorium != 'all') {
            $query->where('peminjaman.id_laboratorium', $request->id_laboratorium);
        }

        return $query->get();
    }

    private function getStatusDistribution($filter, $request)
    {
        $query = Peminjaman::select(
            'peminjaman.status',
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('peminjaman.status');

        $this->applyDateFilter($query, $filter);

        // PERBAIKAN: Specify table untuk filter laboratorium
        if ($request->has('id_laboratorium') && $request->id_laboratorium != 'all') {
            $query->where('peminjaman.id_laboratorium', $request->id_laboratorium);
        }

        $data = $query->get();

        // Map status untuk chart
        $statusMap = [
            'approved' => 'Disetujui',
            'pending' => 'Pending',
            'rejected' => 'Ditolak',
            'done' => 'Selesai'
        ];

        $statusData = [];
        foreach ($statusMap as $key => $label) {
            $found = $data->firstWhere('status', $key);
            $statusData[$label] = $found ? $found->count : 0;
        }

        return $statusData;
    }

    private function getDayOfWeekData($filter, $request)
    {
        $query = Peminjaman::select(
            DB::raw('DAYOFWEEK(peminjaman.tanggal) as day_of_week'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('day_of_week')
            ->orderBy('day_of_week');

        $this->applyDateFilter($query, $filter);

        // PERBAIKAN: Specify table untuk filter laboratorium
        if ($request->has('id_laboratorium') && $request->id_laboratorium != 'all') {
            $query->where('peminjaman.id_laboratorium', $request->id_laboratorium);
        }

        $data = $query->get();

        // Map day of week (MySQL: 1=Sunday, 7=Saturday)
        $daysMap = [2 => 'Senin', 3 => 'Selasa', 4 => 'Rabu', 5 => 'Kamis', 6 => 'Jumat', 7 => 'Sabtu', 1 => 'Minggu'];
        $dayData = array_fill(0, 7, 0);

        foreach ($data as $item) {
            $dayIndex = $item->day_of_week - 1; // Adjust for array index
            $dayData[$dayIndex] = $item->count;
        }

        // Reorder untuk Senin-Sabtu (skip Minggu)
        return [
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'data' => [
                $dayData[1], // Senin
                $dayData[2], // Selasa
                $dayData[3], // Rabu
                $dayData[4], // Kamis
                $dayData[5], // Jumat
                $dayData[6]  // Sabtu
            ]
        ];
    }

    private function getPopularLab($filter, $request)
    {
        $query = Peminjaman::join('laboratorium', 'peminjaman.id_laboratorium', '=', 'laboratorium.id_laboratorium')
            ->select(
                'laboratorium.nama_laboratorium',
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('laboratorium.nama_laboratorium', 'laboratorium.id_laboratorium')
            ->orderBy('count', 'desc')
            ->first();

        return $query ? $query->nama_laboratorium : 'Tidak ada data';
    }

    private function getPopularTime($filter, $request)
    {
        $query = Peminjaman::select(
            DB::raw('CONCAT(jam_mulai, " - ", jam_selesai) as time_slot'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('time_slot')
            ->orderBy('count', 'desc')
            ->first();

        return $query ? $query->time_slot : 'Tidak ada data';
    }

    private function getUsageRate($filter, $request)
    {
        // Hitung total hari kerja dalam periode
        $now = Carbon::now();
        $startDate = $this->getStartDate($filter);
        $endDate = $now->format('Y-m-d');

        $totalDays = $this->getWorkingDays($startDate, $endDate);

        // Hitung total slot yang tersedia (asumsi 5 slot per hari, 5 hari kerja)
        $totalSlots = $totalDays * 5;

        // Hitung slot yang terpakai
        $query = Peminjaman::whereBetween('peminjaman.tanggal', [$startDate, $endDate]);

        // PERBAIKAN: Specify table untuk filter laboratorium
        if ($request->has('id_laboratorium') && $request->id_laboratorium != 'all') {
            $query->where('peminjaman.id_laboratorium', $request->id_laboratorium);
        }

        $usedSlots = $query->count();

        // Hitung persentase
        if ($totalSlots > 0) {
            $usageRate = round(($usedSlots / $totalSlots) * 100);
        } else {
            $usageRate = 0;
        }

        return $usageRate;
    }

    private function getStartDate($filter)
    {
        $now = Carbon::now();

        switch ($filter) {
            case 'weekly':
                return $now->startOfWeek()->format('Y-m-d');
            case 'monthly':
                return $now->startOfMonth()->format('Y-m-d');
            case '3months':
                return $now->subMonths(3)->format('Y-m-d');
            case '6months':
                return $now->subMonths(6)->format('Y-m-d');
            case 'yearly':
                return $now->startOfYear()->format('Y-m-d');
            default:
                return $now->startOfMonth()->format('Y-m-d');
        }
    }

    private function getWorkingDays($startDate, $endDate)
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $workingDays = 0;

        for ($date = $start; $date->lte($end); $date->addDay()) {
            // Skip weekend (Saturday = 6, Sunday = 7)
            if ($date->dayOfWeek !== Carbon::SATURDAY && $date->dayOfWeek !== Carbon::SUNDAY) {
                $workingDays++;
            }
        }

        return $workingDays;
    }

    public function exportExcel()
    {
        return Excel::download(new ReportExport, 'laporan_peminjaman.xlsx');
    }

}
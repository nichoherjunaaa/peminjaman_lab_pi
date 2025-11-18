<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Peminjaman::with(['laboratorium', 'peminjam'])
            ->get()
            ->map(function ($item) {
                return [
                    'Laboratorium' => $item->laboratorium->nama_laboratorium,
                    'Peminjam' => $item->peminjam->nama ?? '-',
                    'NIM' => $item->peminjam->nim ?? '-',
                    'NIP' => $item->peminjam->nip ?? '-',
                    'Email' => $item->peminjam->email ?? '-',
                    'No HP' => $item->peminjam->no_hp ?? '-',
                    'Role' => $item->peminjam_type ?? '-',
                    'Tanggal' => $item->tanggal,
                    'Jam Mulai' => $item->jam_mulai,
                    'Jam Selesai' => $item->jam_selesai,
                    'Kegiatan' => $item->nama_kegiatan,
                    'Status' => $item->status,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Laboratorium',
            'Peminjam',
            'NIM',
            'NIP',
            'Email',
            'No HP',
            'Role',
            'Tanggal',
            'Jam Mulai',
            'Jam Selesai',
            'Kegiatan',
            'Status'
        ];
    }
}

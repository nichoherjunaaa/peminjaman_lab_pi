<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    public $timestamps = false;
    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'nomor_telepon',
        'email'
    ];

    public function peminjaman()
    {
        return $this->morphMany(Peminjaman::class, 'peminjam');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'username');
    }

}

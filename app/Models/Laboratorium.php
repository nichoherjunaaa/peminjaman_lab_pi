<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;

    protected $table = 'laboratorium';
    protected $primaryKey = 'id_laboratorium';
    public $timestamps = false;

    protected $fillable = [
        'nama_laboratorium',
        'lokasi',
        'kapasitas',
        'deskripsi',
        'status',
        'luas'
    ];
    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'id_laboratorium', 'id_laboratorium');
    }


    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_laboratorium');
    }
}

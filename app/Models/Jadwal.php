<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    public $timestamps = false;

    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];
     public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_jadwal');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $timestamps = false;
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'nomor_telepon'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_dosen');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'username');
    }

}

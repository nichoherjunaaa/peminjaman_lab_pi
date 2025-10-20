<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $primaryKey = 'nip';
    protected $table = 'dosen';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'nomor_telepon'
    ];

    public function peminjaman()
    {
        return $this->morphMany(Peminjaman::class, 'peminjam');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'username');
    }

}

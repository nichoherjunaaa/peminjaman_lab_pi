<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    public $timestamps = false;

    protected $fillable = [
        'id_peminjam',
        'peminjam_type',
        'id_laboratorium',
        'id_jadwal',
        'id_admin',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'nama_kegiatan',
        'keperluan',
        'status',
        'alasan_penolakan',
        'created_at',
    ];

    public function peminjam()
    {
        return $this->morphTo(__FUNCTION__, 'peminjam_type', 'id_peminjam');
    }


    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'id_laboratorium');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

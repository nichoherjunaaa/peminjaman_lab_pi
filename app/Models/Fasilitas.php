<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    public $timestamps = false;

    protected $fillable = [
        'id_laboratorium',
        'id_barang',
        'jumlah',
        'kondisi',
    ];

    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'id_laboratorium');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

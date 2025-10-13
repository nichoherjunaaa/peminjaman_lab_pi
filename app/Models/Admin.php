<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'nama',
    ];

    protected $hidden = ['password'];
public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_admin');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekstrakulikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakulikulers';
    protected $primaryKey = 'id_eskul';

    protected $fillable = [
        'nama_ekskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
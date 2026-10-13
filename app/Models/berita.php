<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $primaryKey = 'id_berita';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status',
        'gambar',
        'id_user',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}

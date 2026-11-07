<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'nama_pelapor',
        'no_hp',
        'lokasi',
        'kecamatan',
        'tinggi_air',
        'tanggal_kejadian',
        'keterangan',
        'foto',
        'status',
    ];

    protected $casts = [
        'tinggi_air' => 'integer',
        'tanggal_kejadian' => 'date',
    ];
}
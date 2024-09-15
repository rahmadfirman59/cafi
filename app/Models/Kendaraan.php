<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        "nomor_polisi",
        "nama",
        "kapasitas",
        "merk",
        "tahun",
        "foto",
        "masa_berlaku",
        "servis_terakhir",
        "imei"
    ];
}

<?php

namespace App\Models;

use App\Enum\PermintaanKendaraanStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanKendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "kendaraan_id",
        "nomor_pesanan",
        "tanggal",
        "propinsi",
        "kota",
        "status",
        "kode_lacak",
        "verifikator_id",
        "tanggal_verifikasi",
        "tanggal_akhir",
        "jam_awal",
        "jam_akhir",
        "alamat_1",
        "alamat_2",
        "driver_id",
        "notifikasi_driver",
        "jumlah_perpanjangan"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

}

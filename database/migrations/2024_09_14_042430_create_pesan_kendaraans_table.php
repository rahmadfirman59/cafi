<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesan_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kendaraan_id')->nullable();
            $table->string('nomor_pesanan');
            $table->date('tanggal');
            $table->string('propinsi')->nullable();
            $table->string('kota')->nullable();
            $table->enum('status',['pending','disetujui']);
            $table->string('kode_lacak')->nullable();
            $table->unsignedBigInteger('verifikator_id')->nullable();
            $table->dateTime('tanggal_verifikasi')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->time('jam_awal')->nullable();
            $table->time('jam_akhir')->nullable();
            $table->text('alamat_1')->nullable();
            $table->text('alamat_2')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->integer('notifikasi_driver')->nullable();
            $table->integer('jumlah_perpanjangan')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
            $table->foreign('verifikator_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_kendaraans');
    }
};

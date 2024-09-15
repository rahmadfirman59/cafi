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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_polisi');
            $table->string('nama');
            $table->integer('kapasitas');
            $table->string('merk')->nullable();
            $table->year("tahun")->nullable();
            $table->string('foto')->nullable();
            $table->date("masa_berlaku")->nullable();
            $table->date("servis_terakhir")->nullable();
            $table->string("imei")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};

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
        Schema::create('datasd', function (Blueprint $table) {
            $table->id();
            $table->string('nama_satuan_pendidikan');
            $table->string('npsn')->unique();
            $table->string('bentuk_pendidikan');
            $table->string('status_sekolah');
            $table->string('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasd');
    }
};

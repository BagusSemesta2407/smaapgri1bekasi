<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asal_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrasi_siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('asal_sekolah')->nullable();
            $table->date('tanggal_ijazah')->nullable();
            $table->bigInteger('no_ijazah')->nullable();
            $table->integer('lama_belajar')->nullable();
            $table->string('pindahan_dari_sekolah')->nullable();
            $table->date('waktu_diterima_sekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asal_sekolahs');
    }
};

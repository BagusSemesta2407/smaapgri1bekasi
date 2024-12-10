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
        Schema::create('registrasi_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('waktu_pendaftaran_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->string('nisn')->nullable();
            $table->bigInteger('no_kk')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
            $table->integer('jumlah_saudara_tiri')->nullable();
            $table->string('status_anak')->nullable(); //yatim, piatu, yatim piatu
            $table->string('bahasa')->nullable(); //bahasa sehari hari yang digunakan
            $table->string('parties_contaced')->nullable(); //pihak yang bisa dihubungi
            $table->string('penanggung_jawab')->nullable();
            $table->string('email')->unique();
            $table->bigInteger('no_hp')->nullable();
            $table->bigInteger('no_wa')->nullable();
            $table->bigInteger('telepon')->nullable();
            $table->string('status_pendaftar')->nullable(); //Pendaftar, Siswa
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status_pembayaran')->nullable();
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
        Schema::dropIfExists('registrasi_siswas');
    }
};

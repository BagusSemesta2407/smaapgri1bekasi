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
        Schema::create('orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrasi_siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_ayah')->nullable();
            $table->bigInteger('nik_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('kewarganegaraan_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->text('alamat_ayah')->nullable();
            $table->bigInteger('no_hp_ayah')->nullable();
            $table->string('status_nikah_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->bigInteger('penghasilan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->bigInteger('nik_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('kewarganegaraan_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->text('alamat_ibu')->nullable();
            $table->bigInteger('no_hp_ibu')->nullable();
            $table->string('status_nikah_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->bigInteger('penghasilan_ibu')->nullable();
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
        Schema::dropIfExists('orang_tuas');
    }
};

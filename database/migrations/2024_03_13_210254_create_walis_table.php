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
        Schema::create('walis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pria')->nullable();
            $table->bigInteger('nik_pria')->nullable();
            $table->string('tempat_lahir_pria')->nullable();
            $table->date('tanggal_lahir_pria')->nullable();
            $table->string('kewarganegaraan_pria')->nullable();
            $table->string('pendidikan_pria')->nullable();
            $table->text('alamat_pria')->nullable();
            $table->bigInteger('no_hp_pria')->nullable();
            $table->string('status_nikah_pria')->nullable();
            $table->string('pekerjaan_pria')->nullable();
            $table->bigInteger('penghasilan_pria')->nullable();
            $table->string('nama_perempuan')->nullable();
            $table->bigInteger('nik_perempuan')->nullable();
            $table->string('tempat_lahir_perempuan')->nullable();
            $table->date('tanggal_lahir_perempuan')->nullable();
            $table->string('kewarganegaraan_perempuan')->nullable();
            $table->string('pendidikan_perempuan')->nullable();
            $table->text('alamat_perempuan')->nullable();
            $table->bigInteger('no_hp_perempuan')->nullable();
            $table->string('status_nikah_perempuan')->nullable();
            $table->string('pekerjaan_perempuan')->nullable();
            $table->bigInteger('penghasilan_perempuan')->nullable();
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
        Schema::dropIfExists('walis');
    }
};

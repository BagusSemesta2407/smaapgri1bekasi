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
        Schema::create('tempat_tinggals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrasi_siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('alamat_lengkap')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->string('titik_koordinat')->nullable();
            $table->string('tempat_tinggal_pada')->nullable();
            $table->integer('jarak_tempat_tinggal')->nullable();
            $table->string('transportasi')->nullable();
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
        Schema::dropIfExists('tempat_tinggals');
    }
};

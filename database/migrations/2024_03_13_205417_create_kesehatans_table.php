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
        Schema::create('kesehatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrasi_siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('berat_badan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('penyakit_yang_diderita')->nullable();
            $table->integer('lama_sakit')->nullable();
            $table->integer('hr_bi')->nullable();
            $table->string('kelainan_jasmani_lainnya')->nullable();
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
        Schema::dropIfExists('kesehatans');
    }
};

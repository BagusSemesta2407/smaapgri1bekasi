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
        Schema::create('detaill_diris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrasi_siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('jenis_prestasi_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita-cita')->nullable();
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
        Schema::dropIfExists('detaill_diris');
    }
};

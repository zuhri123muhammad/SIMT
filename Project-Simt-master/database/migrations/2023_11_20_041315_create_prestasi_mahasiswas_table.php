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
        Schema::create('prestasi_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('desc');
            $table->date('date');
            $table->string('level');
            $table->string('type');
            $table->string('image')->nullable();
            $table->timestamps();
            // relasi kolom mahasiswa_id ke kolom id pada table mahasiswas
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi_mahasiswas');
    }
};

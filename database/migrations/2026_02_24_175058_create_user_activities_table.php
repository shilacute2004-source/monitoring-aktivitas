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
        Schema::create('user_activities', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('berat_badan');
        $table->integer('umur');
        $table->string('jenis_kelamin');
        $table->string('jenis_aktivitas')->nullable();
        $table->integer('denyut_jantung')->nullable();
        $table->integer('kalori_terbakar')->nullable();
        $table->integer('durasi')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};

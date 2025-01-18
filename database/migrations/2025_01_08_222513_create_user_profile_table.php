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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('full_name');
            $table->string('nik', 16);
            $table->string('kk', 16);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('validation_status', ['belum validasi', 'direview', 'diterima', 'ditolak'])->default('belum validasi')->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->string('religion');
            $table->enum('marital_status', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->text('address');
            $table->string('education');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profile');
    }
};

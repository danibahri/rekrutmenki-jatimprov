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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->string('full_name');
            $table->string('nik', 16);
            $table->string('kk', 16);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['L', 'P']);
            $table->string('religion');
            $table->enum('marital_status', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->text('address');
            $table->string('registrasion_latter')->nullable(); 
            $table->string('education');
            $table->string('ijazah')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('cv')->nullable();
            $table->string('health_letter')->nullable();
            $table->string('skck')->nullable();
            $table->string('non_criminal_statement')->nullable();
            $table->string('non_party_statement')->nullable();
            $table->string('release_statement')->nullable();
            $table->string('fulltime_statement')->nullable();
            $table->string('supervisor_permission')->nullable();
            $table->string('performance_letter')->nullable();
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

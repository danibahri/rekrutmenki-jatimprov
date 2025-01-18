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
        Schema::create('user_profile_persyaratan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_profile_id')->constrained('user_profile')->onDelete('cascade');
            $table->foreignId('persyaratan_id')->constrained('persyaratan')->onDelete('cascade');
            $table->string('file_path_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profile_persyaratan');
    }
};

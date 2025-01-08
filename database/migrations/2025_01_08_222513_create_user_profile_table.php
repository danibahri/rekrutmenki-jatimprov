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
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('nik', 16)->unique();
            $table->string('kk_number', 16);
            $table->enum('gender', ['male', 'female']);
            $table->string('religion');
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('nationality');
            $table->text('current_address');
            $table->text('permanent_address');
            $table->string('phone_number');
            $table->string('ktp_scan_path')->nullable();
            $table->string('kk_scan_path')->nullable();
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

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
        Schema::create('students', function (Blueprint $table) {
            $table->id();                                    // ID auto increment
            $table->string('name', 100);                     // Nama siswa
            $table->enum('gender', ['L', 'P']);              // Jenis kelamin
            $table->string('phone', 15)->nullable();         // No. HP (boleh kosong)
            $table->string('school', 150);                   // Nama sekolah
            $table->boolean('active')->default(true);        // Status aktif
            $table->timestamps();                            // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

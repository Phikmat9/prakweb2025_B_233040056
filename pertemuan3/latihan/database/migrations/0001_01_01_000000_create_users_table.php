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
        Schema::create('users', function (Blueprint $table) {
        $table->id(); // Membuat kolom Primary Key (ID) otomatis
        $table->string('name'); // Membuat kolom 'name' tipe VARCHAR
        $table->string('email')->unique(); // Kolom email (harus unik)
        $table->timestamp('email_verified_at')->nullable(); // Boleh kosong (null)
        $table->string('password'); // Kolom password
        $table->rememberToken(); // Untuk fitur "Remember Me" saat login
        $table->timestamps(); // Otomatis buat kolom 'created_at' dan 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    // Menghapus tabel 'users' jika tabelnya ada
    Schema::dropIfExists('users');
    }
};

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
        Schema::table('users', function (Blueprint $table) {
            // Ini akan menambahkan kolom 'role' sebagai ENUM
            // Hanya bisa diisi dengan 'admin', 'pembimbing', atau 'peserta'
            // Nilai defaultnya 'peserta'
            // Kolom ini akan ditempatkan setelah kolom 'password'
            $table->enum('role', ['admin', 'pembimbing', 'peserta'])->default('peserta')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Saat rollback, kolom 'role' akan dihapus
            $table->dropColumn('role');
        });
    }
};
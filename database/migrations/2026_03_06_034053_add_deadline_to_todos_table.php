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
        Schema::table('todos', function (Blueprint $table) {
            // Menambahkan kolom deadline setelah kolom keterangan
            // Kolom ini akan menyimpan tanggal dan waktu (YYYY-MM-DD HH:MM:SS)
            $table->dateTime('deadline')->nullable()->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            // Menghapus kolom jika migration di-rollback
            $table->dropColumn('deadline');
        });
    }
};
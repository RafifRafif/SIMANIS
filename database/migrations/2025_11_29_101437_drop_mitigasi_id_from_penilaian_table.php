<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilaian', function (Blueprint $table) {
            // hapus dulu foreign key
            $table->dropForeign(['mitigasi_id']);

            // baru hapus kolom
            $table->dropColumn('mitigasi_id');
        });
    }

    public function down(): void
    {
        Schema::table('penilaian', function (Blueprint $table) {
            $table->unsignedBigInteger('mitigasi_id')->after('id_penilaian')->nullable();
            // opsional: tambahkan kembali foreign key
            // $table->foreign('mitigasi_id')->references('id_mitigasi')->on('mitigasi')->onDelete('cascade');
        });
    }
};

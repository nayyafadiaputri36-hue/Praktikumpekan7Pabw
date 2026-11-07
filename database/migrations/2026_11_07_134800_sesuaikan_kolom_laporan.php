<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->string('no_hp', 20)->nullable();
            $table->string('kecamatan')->nullable();

            $table->renameColumn(
                'tinggi_genangan',
                'tinggi_air'
            );

            $table->string('foto')->nullable();

            $table->enum('status', [
                'Menunggu',
                'Diproses',
                'Selesai'
            ])->default('Menunggu');
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->renameColumn('tinggi_air', 'tinggi_genangan');

            $table->dropColumn([
                'no_hp',
                'kecamatan',
                'foto',
                'status'
            ]);
        });
    }
};
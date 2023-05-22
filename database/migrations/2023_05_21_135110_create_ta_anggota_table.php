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
        Schema::create('ta_anggota', function (Blueprint $table) {
            $table->bigIncrements('id_anggota');
            $table->bigInteger('id_booking');
            $table->string('nama_anggota');
            $table->integer('umur_anggota');
            $table->string('jk_anggota');
            $table->string('status_anggota');
            $table->string('notelp_anggota');
            $table->string('biaya_perorang');
            $table->text('alamat_lengkap_anggota');
            $table->text('riwayat_penyakit_anggota');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ta_anggota');
    }
};

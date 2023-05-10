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
        Schema::create('ta_booking', function (Blueprint $table) {
            $table->bigIncrements('id_booking');
            $table->bigInteger('id_kavling');
            $table->bigInteger('id_user');
            $table->string('no_booking');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->integer('lama_menginap');
            $table->integer('total_biaya');
            $table->integer('status_kavling')->comment('0 = Tidak Aktif, 1 = Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ta_booking');
    }
};

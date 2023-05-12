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
            $table->bigInteger('id_user');
            $table->bigInteger('id_kavling');
            $table->string('no_booking');
            $table->date('tanggal_booking');
            $table->integer('lama_menginap')->nullable();
            $table->integer('total_biaya')->nullable();
            $table->integer('status_pesanan')->comment('0 = Booking, 1 = Belum Bayar');
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

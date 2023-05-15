<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('no_booking')->nullable();
            $table->date('tanggal_booking');
            $table->string('lama_menginap');
            $table->string('total_biaya');
            $table->integer('status_pesanan')->comment('0 = Belum Booking, 1 = Berhasil Booking');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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

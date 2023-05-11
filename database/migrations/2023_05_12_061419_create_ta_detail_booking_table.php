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
        Schema::create('ta_detail_booking', function (Blueprint $table) {
            $table->bigIncrements('id_detail_booking');
            $table->bigInteger('id_booking');
            $table->bigInteger('id_kavling');
            $table->date('tanggal_booking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ta_detail_booking');
    }
};

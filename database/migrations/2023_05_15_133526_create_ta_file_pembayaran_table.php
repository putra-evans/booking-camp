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
        Schema::create('ta_file_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_file_pembayaran');
            $table->bigInteger('id_final_booking');
            $table->bigInteger('id_user');
            $table->string('no_booking');
            $table->string('nama_file_pembayaran');
            $table->string('ctt_pembayaran');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ta_file_pembayaran');
    }
};

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
        Schema::create('ms_kavling', function (Blueprint $table) {
            $table->bigIncrements('id_kavling');
            $table->string('kode_kavling');
            $table->string('nama_kavling');
            $table->integer('status_kavling')->comment('0 = Tidak Aktif, 1 = Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_kavling');
    }
};

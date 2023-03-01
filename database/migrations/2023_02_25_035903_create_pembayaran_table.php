<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->string('id_pembayaran')->primary();
            $table->string('id_petugas')->unique();
            $table->string('nis');
            $table->string('nama');
            $table->date('tgl_bayar');
            $table->integer('bulan_dibayar');
            $table->integer('tahun_dibayar');
            $table->integer('id_spp');
            $table->integer('jumlah_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};

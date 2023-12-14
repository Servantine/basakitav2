<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->string('tujuan_bank');
            $table->string('jenis_sampah');
            $table->string('berat_sampah');
            $table->date('tanggal_diantar');
            $table->string('status')->default('Menunggu');
            $table->enum('cara_pengantaran',['antar sendiri','diantarkan'])->default('diantarkan');
            $table->string('nama_pengantar')->default('Sendiri');
            $table->integer('tagihan');
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
        Schema::dropIfExists('transaksis');
    }
}

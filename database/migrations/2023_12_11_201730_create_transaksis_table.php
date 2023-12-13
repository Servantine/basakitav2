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
            $table->string('status')->default('menunggu');
            $table->enum('cara_pengantaran',['antar sendiri','diantarkan'])->default('diantarkan');
            $table->string('nama_pengantar');
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

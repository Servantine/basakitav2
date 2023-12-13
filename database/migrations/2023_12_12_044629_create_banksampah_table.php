<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bank');
            $table->string('nama_pemilik');
            $table->string('alamat_bank');
            $table->integer('harga_sampah')->default('0');
            $table->integer('kapasitas_sampah')->default('0');
            $table->integer('jumlah_sampah')->default('0');
            $table->enum('status',['kosong','penuh','terisi'])->default('kosong');
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
        Schema::dropIfExists('banksampah');
    }
}

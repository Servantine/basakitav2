<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('plat_kendaraan');
            $table->string('pemilik_kendaraan');
            $table->string('jenis_kendaraan');
            $table->integer('kapasitas_maksimal')->default('0');
            $table->integer('kapasitas_ditampung')->default('0');
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
        Schema::dropIfExists('kendaraan');
    }
}

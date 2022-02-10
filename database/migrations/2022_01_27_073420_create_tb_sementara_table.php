<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSementaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sementara', function (Blueprint $table) {
            $table->id();
            $table->string('produk_kode', 20);
            $table->string('nama_produk', 20);
            $table->string('bahan_baku_kode', 15);
            $table->string('nama_bahan_baku', 20);
            $table->string('digunakan', 20);
            $table->integer('cost');
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
        Schema::dropIfExists('tb_sementara');
    }
}

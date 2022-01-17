<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bahan_baku', function (Blueprint $table) {
            $table->string('kode_bahan_baku', 15)->primary();
            $table->string('nama_bahan_baku', 20);
            $table->integer('persediaan')->unsigned();
            $table->integer('satuan_produk')->unsigned();
            $table->string('satuan', 15);
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
        Schema::dropIfExists('tb_bahan_baku');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->string('kode_produk', 15)->primary();
            $table->string('nama_produk', 20);
            $table->string('jenis_produk_kode', 15);
            $table->timestamps();
        });
        Schema::table('tb_produk', function (Blueprint $table) {


            $table->foreign('jenis_produk_kode')->references('kode_jenis_produk')->on('tb_jenis_produk')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produk');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_penjualan', function (Blueprint $table) {

            $table->id();
            $table->string('transaksi_no', 15);
            $table->string('produk_kode', 20);
            $table->integer('jumlah');
            $table->string('total', 15);
            $table->timestamps();
        });
        Schema::table('tb_detail_penjualan', function (Blueprint $table) {




            $table->foreign('produk_kode')->references('kode_produk')->on('tb_produk')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('transaksi_no')->references('no_transaksi')->on('tb_penjualan')
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
        Schema::dropIfExists('tb_detail_penjualan');
    }
}

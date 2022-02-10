<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('transaksi_no', 15);
            $table->string('produk_kode', 20);
            $table->integer('jumlah');
            $table->string('sub_total', 15);
            $table->timestamps();
        });
        Schema::table('tb_penjualan', function (Blueprint $table) {




            // $table->foreign('produk_kode')->references('id')->on('tb_cost')
            //     ->onDelete('restric')->onUpdate('restric');

            $table->foreign('transaksi_no')->references('no_transaksi')->on('tb_detailpenjualan')
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
        Schema::dropIfExists('tb_penjualan');
    }
}

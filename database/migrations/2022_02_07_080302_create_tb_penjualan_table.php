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
            $table->string('no_transaksi', 15)->primary();
            $table->bigInteger('user_id')->unsigned(); // this is working
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('tgl_transaksi');
            $table->string('sub_total', 15);
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
        Schema::dropIfExists('tb_penjualan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBahanBakuMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bahan_baku_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('bahan_baku_kode', 15);
            $table->integer('jumlah')->unsigned();
            $table->string('harga', 20);
            $table->timestamps();
        });
        Schema::table('tb_bahan_baku_masuk', function (Blueprint $table) {


            $table->foreign('bahan_baku_kode')->references('kode_bahan_baku')->on('tb_bahan_baku')
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
        Schema::dropIfExists('tb_bahan_baku_masuk');
    }
}

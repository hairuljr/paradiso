<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBahanBakuKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bahan_baku_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('bahan_baku_kode', 15);
            $table->string('jumlah', 15);
            $table->timestamps();
        });
        Schema::table('tb_bahan_baku_keluar', function (Blueprint $table) {




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
        Schema::dropIfExists('tb_bahan_baku_keluar');
    }
}

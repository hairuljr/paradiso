<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cost', function (Blueprint $table) {
            $table->id();
            $table->string('cost_id', 20);
            $table->string('produk_kode', 20);
            $table->string('bahan_baku_kode', 20);
            $table->string('cost', 20);
            $table->timestamps();
        });
        Schema::table('tb_cost', function (Blueprint $table) {

            $table->foreign('cost_id')->references('id_cost')->on('tb_detailcost')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produk_kode')->references('kode_produk')->on('tb_produk')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tb_cost');
    }
}

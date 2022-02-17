<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSementaraPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sementara_penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('no_trf')->nullable();
            $table->string('produk_kode', 20)->nullable();
            $table->string('nama_produk', 20)->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('total')->nullable();
            $table->json('bahan_baku')->nullable();
            $table->json('digunakan')->nullable();
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
        Schema::dropIfExists('sementara_penjualans');
    }
}

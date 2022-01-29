<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatBilanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_bilangan', function (Blueprint $table) {
            $table->id();
            $table->float('bilangan_1');
            $table->float('bilangan_2');
            $table->unsignedBigInteger('id_hasil');
            $table->foreign('id_hasil')->references('id')->on('riwayat_hasil')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('riwayat_bilangan');
    }
}

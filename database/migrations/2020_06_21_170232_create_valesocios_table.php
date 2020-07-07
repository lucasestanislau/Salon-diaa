<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValesociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valesocios', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->double('valor');
            $table->unsignedBigInteger('socio_id');
            $table->timestamps();

            $table->foreign('socio_id')->references('id')->on('socios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valesocios');
    }
}

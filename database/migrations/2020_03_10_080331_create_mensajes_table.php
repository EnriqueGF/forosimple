<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idAutor')->unsigned();
            $table->bigInteger('idTema')->unsigned();
            $table->text('mensaje');
            $table->integer('numeroLikes')->default(0);
            $table->timestamps();
            $table->foreign('idTema')->references('id')->on('temas')->onDelete('cascade');
            $table->foreign('idAutor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}

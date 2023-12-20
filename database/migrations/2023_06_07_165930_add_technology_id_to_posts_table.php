<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('technology_id')->nullable();
            $table->foreign('technology_id')->references('id')->on('technologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            /*
            Rimuove la chiave esterna associata alla colonna 'technology_id' nella tabella 'posts'.
            Il parametro 'posts_technology_id_foreign' è il nome della chiave esterna, che di solito è generato in modo automatico da Laravel, seguendo una convenzione di nomi.
            Questo comando elimina l'associazione tra la colonna 'technology_id' e la tabella 'technologies'.
            */
            $table->dropForeign('posts_technology_id_foreign');

            /*
            Rimuove la colonna 'technology_id' dalla tabella 'posts'. Questo comando elimina fisicamente la colonna dallo schema del database.
            */
            $table->dropColumn('technology_id');
        });
    }
};

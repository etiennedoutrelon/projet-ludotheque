<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre')->nullable(false);
            $table->text('body')->nullable(false);
            $table->string('auteur')->nullable(false);
            $table->bigInteger('auteur_id')->unsigned();
            $table->foreign('auteur_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('jeu_id')->unsigned();
            $table->foreign('jeu_id')->references('id')->on('jeux')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('commentaires');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJeuxTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeu_tag', function (Blueprint $table) {
            $table->bigInteger('jeu_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('jeu_id')->references('id')->on('jeux')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jeu_tag');
    }
}

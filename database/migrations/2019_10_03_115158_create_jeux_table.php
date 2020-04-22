<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJeuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nom')->nullable(false);
            $table->date('date_sortie')->nullable(false);
            $table->integer('age_min')->nullable(false);
            $table->integer('nb_joueur')->nullable(false);
            $table->string('duree_partie')->nullable(false);
            $table->string('image')->nullable(true);
            $table->text('description')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jeux');
    }
}

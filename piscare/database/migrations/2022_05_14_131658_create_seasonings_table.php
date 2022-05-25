<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasoningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasonings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_recipe_id')->unsigned();
            $table->foreign('post_recipe_id')->references('id')->on('posts')->onDelete('cascade');
            $table->text('seasoning_name');
            $table->text('quantity');
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
        Schema::dropIfExists('seasonings');
    }
}

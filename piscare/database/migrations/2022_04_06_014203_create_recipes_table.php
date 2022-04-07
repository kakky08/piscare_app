<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('recipe_id');
            $table->integer('category_id');
            $table->integer('search_category_id');
            $table->text('title');
            $table->text('url');
            $table->text('food_image_url');
            $table->text('medium_image_url');
            $table->text('small_image_url');
            $table->text('contributor');
            $table->text('description');
            $table->text('indication');
            $table->text('cost');
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
        Schema::dropIfExists('recipes');
    }
}

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
            $table->bigInteger('recipeId')->primary();
            $table->integer('categoryId');
            $table->integer('searchCategoryId');
            $table->text('title');
            $table->text('url');
            $table->text('foodImageUrl');
            $table->text('mediumImageUrl');
            $table->text('smallImageUrl');
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

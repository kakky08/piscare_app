<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubcatergoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubcatergories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categoryId');
            $table->text('categoryName');
            $table->integer('parentCategoryId');
            $table->integer('searchCategoryId');
            $table->text('searchRecipeId');
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
        Schema::dropIfExists('subsubcatergories');
    }
}

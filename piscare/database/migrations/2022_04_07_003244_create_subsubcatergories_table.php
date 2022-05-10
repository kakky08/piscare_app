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
            $table->integer('category_id');
            $table->text('category_name');
            $table->integer('parent_category_id');
            $table->integer('search_category_id');
            $table->text('search_recipe_id');
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

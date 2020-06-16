<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_directions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id');
	        $table->text('description');
            $table->foreign('recipe_id')->references('id')->on('recipes');
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
	    Schema::table( 'recipe_directions', function (Blueprint $table){
		    $table->dropForeign('recipe_directions_recipe_id_foreign');
	    });
    	Schema::dropIfExists('recipe_directions');
    }
}

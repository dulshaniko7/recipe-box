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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
	        $table->string('name');
	        $table->text('description');
	        $table->string('image');
	        $table->foreign('user_id')->references('id')->on('users');
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
	    Schema::table( 'recipes', function (Blueprint $table){
		    $table->dropForeign('recipes_user_id_foreign');
	    });
    	Schema::dropIfExists('recipes');
    }
}

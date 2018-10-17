<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('taches', function (Blueprint $table) {
	    	$table->increments('id');
	    	$table->string('titre');
	    	$table->date('debut');
	    	$table->date('fin');
	    	$table->string("couleur",10)->default('#FFFFFF');
	    	$table->string('details')->nullable();
	    });
	    Schema::create('membres', function (Blueprint $table) {
	    	$table->increments('id');
	    	$table->string('matricule')->nullable();
	    	$table->string('nom');
	    	$table->string('prenoms');
	    });
	    Schema::create('effectuer', function (Blueprint $table) {
			$table->unsignedInteger('membre_id');
			$table->unsignedInteger('tache_id');
			$table->primary(['membre_id','tache_id']);
			$table->foreign('tache_id')->references('id')->on('taches');
			$table->foreign('membre_id')->references('id')->on('membres');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('effectuer');
	    Schema::dropIfExists('membres');
	    Schema::dropIfExists('taches');
    }
}

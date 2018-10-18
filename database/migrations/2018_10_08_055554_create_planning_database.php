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
	    Schema::create('templates', function (Blueprint $table){
		    $table->string('code',5);
		    $table->string('libelle');
		    $table->string('couleur',10);
		    $table->primary('code');
	    });
	    Schema::create('missions', function (Blueprint $table) {
	    	$table->increments('id');
	    	$table->string('titre');
	    	$table->date('debut');
	    	$table->date('fin');
	    	$table->string('details')->nullable();
	    	$table->string("template_id",5)->nullable();
	    	$table->foreign("template_id")->references('code')->on("templates");
	    });
	    Schema::create('grades', function (Blueprint $table){
		    $table->string("code",7);
		    $table->string('libelle');
		    $table->integer('niveau');
		    $table->primary("code");
	    });
	    Schema::create('membres', function (Blueprint $table) {
	    	$table->increments('id');
	    	$table->string('matricule')->nullable();
	    	$table->string('nom');
	    	$table->string('prenoms');
	    	$table->string("grade_id",7);
		    $table->string('couleur',10)->nullable();
	    	$table->foreign("grade_id")->references("code")->on("grades");
	    });;
	    Schema::create('effectuer', function (Blueprint $table) {
			$table->unsignedInteger('membre_id');
			$table->unsignedInteger('mission_id');
			$table->primary(['membre_id','mission_id']);
			$table->foreign('mission_id')->references('id')->on('missions');
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
	    Schema::dropIfExists('grade');
	    Schema::dropIfExists('missions');
	    Schema::dropIfExists('templates');
    }
}

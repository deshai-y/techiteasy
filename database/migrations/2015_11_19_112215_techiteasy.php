<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Techiteasy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login','255');
            $table->string('password','255');
        });
		
		Schema::create('questionnaire', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','45');
        });
		
		Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
		
		Schema::create('question', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('title');
			$table->string('label');
			$table->string('description');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('category');
        });
		
		Schema::create('answer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
			$table->boolean('verify');
			$table->integer('question_id')->unsigned();
			$table->foreign('question_id')->references('id')->on('question');
        });
		
		Schema::create('questionnaire_has_question', function (Blueprint $table) { 
            $table->integer('questionnaire_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->primary(['questionnaire_id','question_id']);
			$table->foreign('questionnaire_id')->references('id')->on('question');
			$table->foreign('question_id')->references('id')->on('question');

        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('questionnaire_has_question');
		Schema::dropIfExists('answer');		
        Schema::dropIfExists('question');
		Schema::dropIfExists('category');
		Schema::dropIfExists('questionnaire');
		Schema::dropIfExists('user');
    }
}

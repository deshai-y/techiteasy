<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DevDbSalva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('questionnaire_has_category', function (Blueprint $table) {
            $table->integer('questionnaire_id')->references('id')->on('questionnaire');
            $table->integer('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('questionnaire_has_category');
    }
}

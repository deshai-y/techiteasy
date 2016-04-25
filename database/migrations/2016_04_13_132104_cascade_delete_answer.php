<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CascadeDeleteAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
         Schema::table('answer', function (Blueprint $table) {
            $table->dropForeign('question_id');
            $table->foreign('question_id')
            ->references('id')->on('question')
            ->onDelete('cascade');
        });
        $this->command->info('Foreign key updated');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

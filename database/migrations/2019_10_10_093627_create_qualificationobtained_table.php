<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationobtainedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualificationobtained', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->integer('overallscore');
		$table->integer('users_id');
		$table->integer('result_id');
		$table->integer('qualification_id');
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
        Schema::dropIfExists('qualificationobtained');
    }
}

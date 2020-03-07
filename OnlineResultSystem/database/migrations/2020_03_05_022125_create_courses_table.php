<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->string('course_code');
            $table->string('course_title');
            $table->integer('course_credit');
            $table->float('total_mark');
            $table->float('pass_mark_percent');
            $table->float('written_mark');
            $table->float('attendence_mark');
            $table->float('class_test_mark');
            $table->float('practical_mark');
            $table->float('viva');
            $table->float('presentation');
            $table->float('internal_ex_mark');
            $table->float('external_ex_mark');
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
        Schema::dropIfExists('courses');
    }
}

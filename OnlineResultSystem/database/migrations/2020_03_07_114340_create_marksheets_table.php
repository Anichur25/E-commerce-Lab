<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marksheets', function (Blueprint $table) {
            $table->string('student_id');
            $table->integer('part');
            $table->string('semester');
            $table->integer('exam_year');
            $table->string('course_code');
            $table->float('written_exam_mark');
            $table->float('class_test_mark');
            $table->float('attendence_mark_written');
            $table->float('practical_exam_mark');
            $table->float('attendence_mark_lab');
            $table->float('viva_mark_lab');
            $table->float('internal_mark');
            $table->float('external_mark');
            $table->float('presentation_mark');
            $table->float('total_viva');
            $table->float('grade_point');
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
        Schema::dropIfExists('marksheets');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id');
            $table->string('student_name');
            $table->string('student_father_name');
            $table->string('student_dob');
            $table->string('hall');
            $table->string('session');
            $table->string('gender');
            $table->string('address');
            $table->string('student_email');
            $table->string('student_mobile_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

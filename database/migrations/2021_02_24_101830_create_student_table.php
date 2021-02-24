<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stdID', 13);
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->integer('subject_id')->unsigned();
            $table->string('image_url', 200)->nullable();
            $table->timestamps();

            // Foreign Key
            // [subject_id] use PK from [id] in category table
            $table->foreign('subject_id')->references('id')->on('subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}

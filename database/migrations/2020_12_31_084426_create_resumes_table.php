<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> integer('user_id');
            $table->string('name', 100);
            $table->string('profession');
            $table->text('about');
            $table->text('image');
            $table->string('email', 100);
            $table->string('phoneNo');
            $table->date('birthday');
            $table->string('county', 100);
            $table->string('facebook', 100);
            $table->string('twitter', 100);
            $table->string('insta', 100);
            $table->text('resumeContent');
            $table->string('school', 100);
            $table->string('qualification', 100);
            $table->date('dateFromEd');
            $table->date('dateToEd');
            $table->string('employer', 100);
            $table->string('position', 100);
            $table->date('from', 100);
            $table->date('to', 100);
            $table->string('skill1', 100);
            $table->string('skill2', 100);
            $table->string('skill3', 100);
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
        Schema::dropIfExists('resumes');
    }
}

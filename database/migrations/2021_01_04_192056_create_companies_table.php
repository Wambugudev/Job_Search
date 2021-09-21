<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('category');
            $table->string('tagline');
            $table->string('ceo');
            $table->longText('description');
            $table->string('image');
            $table->string('email');
            $table->string('website');
            $table->string('employees');
            $table->string('phone');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->longText('about');

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
        Schema::dropIfExists('companies');
    }
}

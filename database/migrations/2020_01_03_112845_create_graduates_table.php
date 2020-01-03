<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduates', function (Blueprint $table) {
            $table->uuid('graduate_id');
            $table->primary('graduate_id');
            $table->bigInteger('#');
            $table->unique('#');
            $table->string('profile_pic', 500);
            $table->bigInteger('lrn');
            $table->unique('lrn');
            $table->string('strand', 20);
            $table->string('firstname', 30);
            $table->string('middlename', 30);
            $table->string('lastname', 30);
            $table->string('address', 200);
            $table->date('birthday');
            $table->integer('age');
            $table->string('gender', 15);
            $table->string('civil_status', 15);
            $table->string('email', 150);
            $table->unique('email', 150);
            $table->string('phone', 20);
            $table->unique('phone', 20);
            $table->string('status', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduates');
    }
}

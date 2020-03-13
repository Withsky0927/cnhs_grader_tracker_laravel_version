<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private function changeToBlobType()
    {
        DB::statement('ALTER TABLE `guests` CHANGE `profile_pic` `profile_pic` LONGBLOB NULL');
    }
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->uuid('guest_id');
            $table->primary('guest_id');
            $table->string('profile_pic', 1024);
            $table->string('username', 50);
            $table->unique('username');
            $table->string('password', 150);
            $table->string('email', 100);
            $table->unique('email');
            $table->string('phone', 20);
            $table->unique('phone');
            $table->integer('lrn')->unsigned();
            $table->unique('lrn');
            $table->string('strand', 20);
            $table->string('firstname', 30);
            $table->string('middlename', 30);
            $table->string('lastname', 30);
            $table->string('address', 500);
            $table->date('birthday');
            $table->integer('age')->unsigned();
            $table->string('gender', 20);
            $table->string('civil_status', 30);
            $table->string('status', 20);
            $table->string('role', 50);
            $table->string('graduate_id', 255)->nullable();
            $table->unique('graduate_id');
            $table->string('account_id', 255)->nullable();
            $table->unique('account_id');
            $table->date('createdAt');
            $table->date('updatedAt')->nullable();
        });

        $this->changeToBlobType();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}

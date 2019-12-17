<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            `admin_id` VARCHAR(255) NOT NULL PRIMARY KEY,
            `profie_pic` varchar(500) NULL,
            `username` varchar(50) NOT NULL UNIQUE,
            `password` VARCHAR(124) NOT NULL,
            `email` VARCHAR(100) NOT NULL UNIQUE,
            `mobile` INT(20) NOT NULL UNIQUE,
            `account_id` VARCHAR(255) NULL UNIQUE
        */

        Schema::create('admins', function (Blueprint $table) {
            $table->uuid('admin_id');
            $table->primary('admin_id');
            $table->string('profile_pic', 1024)->nullable();
            $table->string('username', 50);
            $table->unique('username');
            $table->string('role', 50);
            $table->string('email', 100);
            $table->unique('email');
            $table->string('phone', 20);
            $table->string('account_id', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}

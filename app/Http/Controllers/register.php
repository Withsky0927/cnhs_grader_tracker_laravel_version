<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;



class register extends Controller
{
    /*
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
            $table->integer('age')->unsigned()->change();
            $table->string('civilStatus', 30);
            $table->string('status', 20);
            $table->string('role', 50);
            $table->string('graduate_id', 255)->nullable();
            $table->unique('graduate_id');
            $table->string('account_id', 255)->nullable();
            $table->unique('account_id');
            $table->date('created_at');
    */

    public function getRegisterForm(Request $request)
    {
        $data = '';
        return view('register', compact('data'));
    }


    public function submitRegisterForm(Request $request)
    {
    }
}

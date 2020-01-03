<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class GraduatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        /*
            $table->uuid('graduate_id');
            $table->primary('graduate_id');
            $table->bigInteger('#');
            $table->unique('#');
            $table->string('profile_pic', 500);
            $table->integer('lrn');
            $table->unique('lrn');
            $table->string('strand', 20);
            $table->string('firstname', 30);
            $table->string('middlename', 30);
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
        */

        DB::table('graduates')->insert([
            'graduate_id' => Str::uuid()->toString(),
            '#' => 1,
            'profile_pic'  => "Helloworld",
            'lrn' => 20131252510,
            'strand' => 'STEM',
            'firstname' => 'George David',
            'middlename' => 'Baylon',
            'lastname' => 'Withmore',
            'address' => '293 castellar st.',
            'birthday' => '2019-12-27',
            'age' => 23,
            'gender' => 'Male',
            'civil_status' => 'Single',
            'email' => 'davidwithmore422@gmail.com',
            'phone' => '09354075756',
            'status' => 'Employed'
        ]);
        DB::table('graduates')->insert([
            'graduate_id' => Str::uuid()->toString(),
            '#' => 2,
            'profile_pic' => "Helloworld",
            'lrn' => 20131052911,
            'strand' => 'GAS',
            'firstname' => 'David',
            'middlename' => 'Navarro',
            'lastname' => 'Palomares',
            'address' => '293 castellar st.',
            'birthday' => '2019-12-27',
            'age' => 22,
            'gender' => 'Male',
            'civil_status' => 'Single',
            'email' => 'davidwithmore524@gmail.com',
            'phone' => '09354075754',
            'status' => 'Unemployed'
        ]);

        DB::table('graduates')->insert([
            'graduate_id' => Str::uuid()->toString(),
            '#' => 3,
            'profile_pic' => "Helloworld",
            'lrn' => 20131058514,
            'strand' => 'ABM',
            'firstname' => 'John',
            'middlename' => 'Dulos',
            'lastname' => 'Catherine',
            'address' => '293 castellar st.',
            'birthday' => '2019-12-27',
            'age' => 21,
            'gender' => 'Male',
            'civil_status' => 'Single',
            'email' => 'davidwithmore523@gmail.com',
            'phone' => '09354075758',
            'status' => 'Waiting'
        ]);


        DB::table('graduates')->insert([
            'graduate_id' => Str::uuid()->toString(),
            '#' => 4,
            'profile_pic' => "Helloworld",
            'lrn' => 20121052410,
            'strand' => 'HUMSS',
            'firstname' => 'George David',
            'middlename' => 'Baylon',
            'lastname' => 'Withmore',
            'address' => '293 castellar st.',
            'birthday' => '2019-12-27',
            'age' => 23,
            'gender' => 'Male',
            'civil_status' => 'Single',
            'email' => 'davidwithmore428@gmail.com',
            'phone' => '09354075753',
            'status' => 'Employed'
        ]);


        DB::table('graduates')->insert([
            'graduate_id' => Str::uuid()->toString(),
            '#' => 5,
            'profile_pic' => "Helloworld",
            'lrn' => 20134052511,
            'strand' => 'TVL',
            'firstname' => 'David',
            'middlename' => 'Navarro',
            'lastname' => 'Palomares',
            'address' => '293 castellar st.',
            'birthday' => '2019-12-27',
            'age' => 22,
            'gender' => 'Male',
            'civil_status' => 'Single',
            'email' => 'davidwithmore424@gmail.com',
            'phone' => '09354074759',
            'status' => 'Unemployed'
        ]);

        DB::table('graduates')->insert([
            'graduate_id' => Str::uuid()->toString(),
            '#' => 6,
            'profile_pic' => "Helloworld",
            'lrn' => 20131052514,
            'strand' => 'ARTS AND SCIENCE',
            'firstname' => 'John',
            'middlename' => 'Dulos',
            'lastname' => 'Catherine',
            'address' => '293 castellar st.',
            'birthday' => '2019-12-27',
            'age' => 21,
            'gender' => 'Male',
            'civil_status' => 'Single',
            'email' => 'davidwithmore423@gmail.com',
            'phone' => '09352075757',
            'status' => 'Waiting'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /* 
        $table->uuid('admin_id');
        $table->primary('admin_id');
        $table->string('profile_pic', 1024)->nullable();
        $table->string('username', 50);
        $table->unique('username');
        $table->string('role', 50);
        $table->string('email', 100);
        $table->unique('email');
        $table->string('phone', 20);
        $table->string('account_id', 255)->nullable();
        $table->unique('account_id');

     */
    public function run()
    {
        // super admin Account sedeer Seeder
        $uuidSuperadmin = Str::uuid()->toString();
        DB::table('admins')->insert([
            'admin_id' => $uuidSuperadmin,
            'username' => 'superadmin',
            'password' => Hash::make('password', [
                'memory' => 1024,
                'time' => 2,
                'threads' => 2,
            ]),
            'role' => 'superadmin',
            'email' => 'superadmin@test.com',
            'phone' => '09354075757'
        ]);

        $superadminAccount = DB::table('admins')->where('admin_id', $uuidSuperadmin)->first();
        DB::table('accounts')->insert([
            'account_id' => $superadminAccount->admin_id,
            'username' => $superadminAccount->username,
            'password' => $superadminAccount->password,
            'role' => $superadminAccount->role,
            'account_status' => 'approved'  
        ]);


        // super admin Account sedeer Seeder
        $uuidAdmin = Str::uuid()->toString();
        DB::table('admins')->insert([
            'admin_id' => $uuidAdmin,
            'username' => 'admin1234',
            'password' => Hash::make('password', [
                'memory' => 1024,
                'time' => 2,
                'threads' => 2,
            ]),
            'role' => 'admin',
            'email' => 'admin@test.com',
            'phone' => '093540757576'
        ]);

        $adminAccount = DB::table('admins')->where('admin_id', $uuidAdmin)->first();
        DB::table('accounts')->insert([
            'account_id' => $adminAccount->admin_id,
            'username' => $adminAccount->username,
            'password' => $adminAccount->password,
            'role' => $adminAccount->role,
            'account_status' => 'approved'
        ]);
    }
}

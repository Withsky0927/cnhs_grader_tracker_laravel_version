<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ScholarShipProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('scholarship_programs')->insert([
            'school_name' => 'saint joseph college'
        ]);
    }
}

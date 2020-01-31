<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ScholarshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 22; $i++) {
            DB::table('scholarships')->insert([
                'scholarship_id' => Str::uuid()->toString(),
                'school_name' => 'saint joseph college',
                'scholarship_desc' => Str::random(20),
                'scholarship_req' => Str::random(20),
                'grade' => 80,
                'school_link' => 'https://sjcc.edu.ph',
            ]);
        }
    }
}

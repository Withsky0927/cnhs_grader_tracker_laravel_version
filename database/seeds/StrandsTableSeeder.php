<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('strands')->insert([
            'strand_name' => 'stem',
        ]);
        DB::table('strands')->insert([
            'strand_name' => 'abm',
        ]);
        DB::table('strands')->insert([
            'strand_name' => 'humss',
        ]);
        DB::table('strands')->insert([
            'strand_name' => 'tvl',
        ]);
        DB::table('strands')->insert([
            'strand_name' => 'gas',
        ]);
        DB::table('strands')->insert([
            'strand_name' => 'arts and science',
        ]);
    }
}

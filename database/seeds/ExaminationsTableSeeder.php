<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExaminationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for ($i = 0; $i < 21; $i++) {
            DB::table('exams')->insert([
                'exam_id' => Str::uuid()->toString(),
                'school' => 'saint joseph college',
                'exam_description' => Str::random(20),
                'examination_date' => '2019' . '-' . '12' . '-' . '20',
            ]);
        }
    }
}

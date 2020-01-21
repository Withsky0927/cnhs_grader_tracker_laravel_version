<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class JobFairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Programmer',
            'strand' => 'stem',
            'company' => 'MA technologies',
            'address' => '5051 castellar st.',
            'job_description' => 'System Administrator',
            'job_qualification' => 'Unix, Docker',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-25'
        ]);
        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Web Developer',
            'strand' => 'abm',
            'company' => 'MA technologies',
            'address' => '5052 castellar st.',
            'job_description' => 'C++ Engineer',
            'job_qualification' => 'C++',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-30'
        ]);

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'PHP developer',
            'strand' => 'gas',
            'company' => 'MA technologies',
            'address' => '5053 castellar st.',
            'job_description' => 'C# Developer',
            'job_qualification' => 'C#',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-12'
        ]);

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Javascript Engineer',
            'strand' => 'tvl',
            'company' => 'MA technologies',
            'address' => '5054 castellar st.',
            'job_description' => 'C Developer',
            'job_qualification' => 'C',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-09'
        ]);

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Python Developer',
            'strand' => 'humss',
            'company' => 'SSCGI',
            'address' => '5055 castellar st.',
            'job_description' => 'Python Developer Uses Python',
            'job_qualification' => 'Python3',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-20'
        ]);

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Programmer',
            'strand' => 'stem',
            'company' => 'MA technologies',
            'address' => '5051 castellar st.',
            'job_description' => 'Programmer uses multiple programming language',
            'job_qualification' => 'C++, Javascript',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-28'
        ]);
        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Javascript Engineer',
            'strand' => 'abm',
            'company' => 'MA technologies',
            'address' => '5052 castellar st.',
            'job_description' => 'Javascript Engineer uses javascript',
            'job_qualification' => 'React.js, ES6',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-29'
        ]);

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Programmer',
            'strand' => 'gas',
            'company' => 'MA technologies',
            'address' => '5053 castellar st.',
            'job_description' => 'Django Developer',
            'job_qualification' => 'Python3, html5',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-29'
        ]);

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Programmer',
            'strand' => 'tvl',
            'company' => 'MA technologies',
            'address' => '5054 castellar st.',
            'job_description' => 'Rust Developer',
            'job_qualification' => 'Rust Programming language',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-29'
        ]);

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid(),
            'job' => 'Programmer',
            'strand' => 'humss',
            'company' => 'MA technologies',
            'address' => '5055 castellar st.',
            'job_description' => 'Css3 Developer',
            'job_qualification' => 'CSS3, HTML5',
            'job_posted' => '2018-07-30',
            'job_avail' => '2019-11-29'
        ]);
    }
}

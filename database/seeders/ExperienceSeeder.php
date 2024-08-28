<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exp = [

            'title'=>'Intern(Web Developer)',
            'sector'=>'Systech Digital Ltd',
            'description'=>'Systech Digital Limited is a CMMI level 3, ISO 27001:2013, and ISO 9001:2015 certified leading software product and services company in Bangladesh.',
            'time'=>'January,2023 - April,2023'
        ];

        Experience::create($exp);

    }
}

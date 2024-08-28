<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
          [ 'title'=>'S.S.C',
            'sector'=>'Govt. Laboratory High School,Khulna',
            'description'=>'Govt. Labrotory High School is an educational establishment that is located at Telegati Kuet Khan Jahan Ali Khulna.',
            'time'=>'2016' ],
          [ 'title'=>'H.S.C',
            'sector'=>'Khulna Model college,Khulna',
            'description'=>'Khulna Model School And College is an educational establishment that is located at Boyra G.p.o.9000 Khalishpur Khulna',
            'time'=>'2018' ],
          [ 'title'=>'B.Sc in CSE',
            'sector'=>'Uttara University,Uttara',
            'description'=>'Situated in the outskirts of Dhaka City, Uttara University is a center of excellence for tertiary education in Bangladesh. It was started in 2003 with a few students and departments.',
            'time'=>'2019-2022' ],
        ];

        foreach($educations as $education){
         Education::create($education);

        }
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['program'=>'PHP','percentage'=>'50'],
            ['program'=>'Laravel','percentage'=>'70'],
            ['program'=>'Ajax','percentage'=>'60'],
            ['program'=>'Jave Script','percentage'=>'60'],
            ['program'=>'HTML','percentage'=>'90'],
            ['program'=>'CSS','percentage'=>'70'],
            ['program'=>'Bootstrap','percentage'=>'80'],
            ['program'=>'JQuery','percentage'=>'60'],
            
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name'=>'Sajid Rayhan',
            'image' => 'uploads/imageSeed/sr3.jpg',
            'email'=>'sajidrayhan875@gmail.com',
            'description'=> "I am a laravel developer with a Bachelor's  degree in Computer Science & Engineering & hands on experience with php Framework(Laravel), Javascript, Ajax,Bootstrap, jQuery, CSS etc.",
            'phone'=>'01329497106',
            'designation'=>'Laravel Developer',
            'experience'=>'1',
            'address'=>'Sector-6,Uttara,Dhaka',
            'age'=>'24',
            'nationality'=>'Bangladeshi',
            'freelance'=>'No',
            'complete_project'=>'4',
            'languages'=>'Bangla,English',
            'linkedin'=>'https://www.linkedin.com/in/sajid-rayhan-a1a953252/',
            'cv'=>'uploads/CV/CV-of-Md-Sajid-Rayhan.pdf',
            'email_verified_at'=> now(),
            'password'=> bcrypt(123456)

           ];
           User::create($user);
    }
}

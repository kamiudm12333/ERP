<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentClass;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentClass::create(['name' => 'Class A']);
        StudentClass::create(['name' => 'Class B']);
        StudentClass::create(['name' => 'Class C']);
        StudentClass::create(['name' => 'Advanced Class']);
        StudentClass::create(['name' => 'Beginner Class']);
    }
}
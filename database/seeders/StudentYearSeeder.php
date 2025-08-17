<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentYear;

class StudentYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentYear::create(['name' => '2024']);
        StudentYear::create(['name' => '2023']);
        StudentYear::create(['name' => '2022']);
        StudentYear::create(['name' => '2021']);
    }
}
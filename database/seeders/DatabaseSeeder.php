<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StudentClassSeeder::class,
            StudentYearSeeder::class,
            EmployeeSeeder::class,
            ClientSeeder::class,
            StudentSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}

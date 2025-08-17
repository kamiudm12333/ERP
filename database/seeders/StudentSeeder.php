<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\User;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = StudentClass::all();
        $years = StudentYear::all();
        $employees = User::where('role', 'employee')->get();
        $firstNames = ['Alice', 'Bob', 'Charlie', 'Diana', 'Eve', 'Frank', 'Grace', 'Henry', 'Ivy', 'Jack', 'Kate', 'Liam', 'Mia', 'Noah', 'Olivia'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia', 'Miller', 'Davis', 'Rodriguez', 'Martinez', 'Anderson', 'Taylor', 'Thomas', 'Hernandez', 'Moore'];

        for ($i = 1; $i <= 15; $i++) {
            $firstName = $firstNames[$i - 1];
            $lastName = $lastNames[$i - 1];
            
            Student::create([
                'student_id' => 'STU' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => strtolower($firstName) . '.' . strtolower($lastName) . $i . '@student.edu',
                'phone' => '+1-555-' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
                'date_of_birth' => now()->subYears(rand(18, 25)),
                'gender' => ['male', 'female', 'other'][array_rand(['male', 'female', 'other'])],
                'address' => rand(100, 9999) . ' Student St',
                'city' => 'Student City',
                'state' => 'CA',
                'zip_code' => '90210',
                'country' => 'USA',
                'emergency_contact_name' => $lastName . ' Family',
                'emergency_contact_phone' => '+1-555-' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
                'emergency_contact_relationship' => 'Parent',
                'enrollment_date' => now()->subDays(rand(30, 365)),
                'status' => ['active', 'inactive', 'graduated'][array_rand(['active', 'inactive', 'graduated'])],
                'class_id' => $classes->random()->id,
                'year_id' => $years->random()->id,
                'assigned_to' => $employees->random()->id,
                'notes' => 'Sample student notes for demonstration purposes.',
            ]);
        }
    }
}
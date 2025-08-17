<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ]);

        // Create sample student classes
        \App\Models\StudentClass::create(['name' => 'Class A']);
        \App\Models\StudentClass::create(['name' => 'Class B']);
        \App\Models\StudentClass::create(['name' => 'Class C']);

        // Create sample student years
        \App\Models\StudentYear::create(['name' => '2023']);
        \App\Models\StudentYear::create(['name' => '2024']);
        \App\Models\StudentYear::create(['name' => '2025']);

        // Create sample clients
        \App\Models\Client::create([
            'name' => 'John Doe',
            'company_name' => 'Acme Corp',
            'email' => 'john@acmecorp.com',
            'phone' => '555-0123',
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NY',
            'zip_code' => '10001',
            'status' => 'active',
            'total_business' => 25000.00,
        ]);

        \App\Models\Client::create([
            'name' => 'Jane Smith',
            'company_name' => 'Tech Solutions Inc',
            'email' => 'jane@techsolutions.com',
            'phone' => '555-0124',
            'address' => '456 Oak Ave',
            'city' => 'San Francisco',
            'state' => 'CA',
            'zip_code' => '94102',
            'status' => 'active',
            'total_business' => 45000.00,
        ]);

        // Create sample employees
        \App\Models\Employee::create([
            'employee_id' => 'EMP001',
            'name' => 'Alice Johnson',
            'email' => 'alice@company.com',
            'phone' => '555-0125',
            'department' => 'Human Resources',
            'position' => 'HR Manager',
            'salary' => 75000.00,
            'hire_date' => '2023-01-15',
            'employment_type' => 'full-time',
            'status' => 'active',
        ]);

        \App\Models\Employee::create([
            'employee_id' => 'EMP002',
            'name' => 'Bob Wilson',
            'email' => 'bob@company.com',
            'phone' => '555-0126',
            'department' => 'IT',
            'position' => 'Software Developer',
            'salary' => 85000.00,
            'hire_date' => '2023-03-01',
            'employment_type' => 'full-time',
            'status' => 'active',
        ]);

        // Create sample students
        \App\Models\Student::create([
            'student_id' => 'STU001',
            'name' => 'Emma Davis',
            'email' => 'emma@student.com',
            'phone' => '555-0127',
            'student_class_id' => 1,
            'student_year_id' => 1,
            'admission_date' => '2023-09-01',
            'status' => 'active',
            'fees_paid' => 5000.00,
            'fees_pending' => 2000.00,
        ]);

        \App\Models\Student::create([
            'student_id' => 'STU002',
            'name' => 'Michael Brown',
            'email' => 'michael@student.com',
            'phone' => '555-0128',
            'student_class_id' => 2,
            'student_year_id' => 1,
            'admission_date' => '2023-09-01',
            'status' => 'active',
            'fees_paid' => 4500.00,
            'fees_pending' => 2500.00,
        ]);
    }
}

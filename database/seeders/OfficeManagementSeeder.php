<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Project;
use App\Models\StudentClass;
use App\Models\StudentYear;

class OfficeManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample users
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@office.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@office.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@office.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        // Create sample student classes
        $classes = [
            ['name' => 'Class A'],
            ['name' => 'Class B'],
            ['name' => 'Class C'],
        ];

        foreach ($classes as $classData) {
            StudentClass::create($classData);
        }

        // Create sample student years
        $years = [
            ['name' => '2024'],
            ['name' => '2025'],
            ['name' => '2026'],
        ];

        foreach ($years as $yearData) {
            StudentYear::create($yearData);
        }

        // Create sample clients
        $clients = [
            [
                'name' => 'John Smith',
                'email' => 'john@company.com',
                'phone' => '+1-555-0101',
                'company' => 'Tech Solutions Inc.',
                'position' => 'CEO',
                'status' => 'active',
                'assigned_to' => 1,
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah@business.com',
                'phone' => '+1-555-0102',
                'company' => 'Marketing Pro',
                'position' => 'Marketing Director',
                'status' => 'prospect',
                'assigned_to' => 2,
            ],
            [
                'name' => 'Mike Wilson',
                'email' => 'mike@consulting.com',
                'phone' => '+1-555-0103',
                'company' => 'Consulting Group',
                'position' => 'Senior Consultant',
                'status' => 'active',
                'assigned_to' => 1,
            ],
        ];

        foreach ($clients as $clientData) {
            Client::create($clientData);
        }

        // Create sample students
        $students = [
            [
                'first_name' => 'Alice',
                'last_name' => 'Brown',
                'email' => 'alice@student.com',
                'phone' => '+1-555-0201',
                'date_of_birth' => '2005-03-15',
                'gender' => 'female',
                'enrollment_date' => '2024-01-15',
                'status' => 'active',
                'student_class_id' => 1,
                'student_year_id' => 1,
                'assigned_to' => 2,
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Davis',
                'email' => 'bob@student.com',
                'phone' => '+1-555-0202',
                'date_of_birth' => '2004-07-22',
                'gender' => 'male',
                'enrollment_date' => '2024-01-10',
                'status' => 'active',
                'student_class_id' => 2,
                'student_year_id' => 1,
                'assigned_to' => 3,
            ],
            [
                'first_name' => 'Carol',
                'last_name' => 'Miller',
                'email' => 'carol@student.com',
                'phone' => '+1-555-0203',
                'date_of_birth' => '2005-11-08',
                'gender' => 'female',
                'enrollment_date' => '2024-01-20',
                'status' => 'enrolled',
                'student_class_id' => 1,
                'student_year_id' => 1,
                'assigned_to' => 2,
            ],
        ];

        foreach ($students as $studentData) {
            Student::create($studentData);
        }

        // Create sample employees
        $employees = [
            [
                'first_name' => 'David',
                'last_name' => 'Anderson',
                'email' => 'david@office.com',
                'phone' => '+1-555-0301',
                'date_of_birth' => '1985-05-12',
                'gender' => 'male',
                'hire_date' => '2023-01-15',
                'position' => 'Senior Developer',
                'department' => 'IT',
                'salary' => 75000.00,
                'status' => 'active',
                'assigned_to' => 1,
            ],
            [
                'first_name' => 'Emma',
                'last_name' => 'Taylor',
                'email' => 'emma@office.com',
                'phone' => '+1-555-0302',
                'date_of_birth' => '1990-09-18',
                'gender' => 'female',
                'hire_date' => '2023-03-01',
                'position' => 'HR Manager',
                'department' => 'Human Resources',
                'salary' => 65000.00,
                'status' => 'active',
                'assigned_to' => 1,
            ],
            [
                'first_name' => 'Frank',
                'last_name' => 'Garcia',
                'email' => 'frank@office.com',
                'phone' => '+1-555-0303',
                'date_of_birth' => '1988-12-03',
                'gender' => 'male',
                'hire_date' => '2023-06-10',
                'position' => 'Accountant',
                'department' => 'Finance',
                'salary' => 60000.00,
                'status' => 'active',
                'assigned_to' => 2,
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create($employeeData);
        }

        // Create sample projects
        $projects = [
            [
                'name' => 'Website Redesign',
                'description' => 'Complete redesign of company website with modern UI/UX',
                'client_id' => 1,
                'employee_id' => 1,
                'start_date' => '2024-01-01',
                'end_date' => '2024-03-31',
                'status' => 'active',
                'priority' => 'high',
                'budget' => 25000.00,
                'assigned_to' => 1,
            ],
            [
                'name' => 'Marketing Campaign',
                'description' => 'Q1 marketing campaign for new product launch',
                'client_id' => 2,
                'employee_id' => 2,
                'start_date' => '2024-01-15',
                'end_date' => '2024-04-15',
                'status' => 'planning',
                'priority' => 'medium',
                'budget' => 15000.00,
                'assigned_to' => 2,
            ],
            [
                'name' => 'Student Training Program',
                'description' => 'Develop training program for new students',
                'client_id' => null,
                'employee_id' => 2,
                'student_id' => 1,
                'start_date' => '2024-02-01',
                'end_date' => '2024-05-31',
                'status' => 'planning',
                'priority' => 'medium',
                'budget' => 8000.00,
                'assigned_to' => 3,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }
    }
}
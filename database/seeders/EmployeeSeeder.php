<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role', 'employee')->get();

        foreach ($users as $index => $user) {
            $positions = ['Manager', 'Coordinator', 'Assistant'];
            $departments = ['Management', 'Operations', 'Support'];
            
            Employee::create([
                'employee_id' => 'EMP' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'user_id' => $user->id,
                'first_name' => explode(' ', $user->name)[0],
                'last_name' => explode(' ', $user->name)[1] ?? '',
                'email' => $user->email,
                'phone' => '+1-555-' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
                'hire_date' => now()->subDays(rand(30, 365)),
                'position' => $positions[$index] ?? 'Employee',
                'department' => $departments[$index] ?? 'General',
                'salary' => rand(30000, 80000),
                'status' => 'active',
                'address' => rand(100, 9999) . ' Main St',
                'city' => 'Sample City',
                'state' => 'CA',
                'zip_code' => '90210',
                'country' => 'USA',
            ]);
        }
    }
}
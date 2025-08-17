<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::all();
        $employees = User::where('role', 'employee')->get();
        $projectNames = ['Website Redesign', 'Mobile App Development', 'Database Migration', 'Cloud Infrastructure', 'Security Audit', 'Performance Optimization', 'API Integration', 'UI/UX Design', 'Testing & QA', 'Documentation'];

        foreach ($clients as $index => $client) {
            if ($index < count($projectNames)) {
                Project::create([
                    'name' => $projectNames[$index],
                    'description' => 'Sample project description for ' . $projectNames[$index] . '. This project aims to improve the client\'s business operations.',
                    'client_id' => $client->id,
                    'assigned_to' => $employees->random()->id,
                    'start_date' => now()->subDays(rand(10, 60)),
                    'end_date' => now()->addDays(rand(30, 120)),
                    'status' => ['planning', 'active', 'on_hold', 'completed'][array_rand(['planning', 'active', 'on_hold', 'completed'])],
                    'priority' => ['low', 'medium', 'high', 'urgent'][array_rand(['low', 'medium', 'high', 'urgent'])],
                    'budget' => rand(5000, 50000),
                    'actual_cost' => rand(3000, 45000),
                    'progress' => rand(0, 100),
                    'notes' => 'Sample project notes for demonstration purposes.',
                ]);
            }
        }
    }
}
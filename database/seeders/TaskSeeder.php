<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();
        $employees = User::where('role', 'employee')->get();
        $taskTitles = [
            'Requirements Analysis', 'Design Planning', 'Development Setup', 'Code Implementation',
            'Testing Phase', 'Documentation', 'Client Review', 'Deployment', 'Training', 'Support'
        ];

        foreach ($projects as $project) {
            $numTasks = rand(3, 6);
            
            for ($i = 0; $i < $numTasks; $i++) {
                $title = $taskTitles[array_rand($taskTitles)];
                
                Task::create([
                    'title' => $title,
                    'description' => 'Task description for ' . $title . ' in project ' . $project->name,
                    'project_id' => $project->id,
                    'assigned_to' => $employees->random()->id,
                    'due_date' => now()->addDays(rand(1, 30)),
                    'status' => ['pending', 'in_progress', 'completed'][array_rand(['pending', 'in_progress', 'completed'])],
                    'priority' => ['low', 'medium', 'high', 'urgent'][array_rand(['low', 'medium', 'high', 'urgent'])],
                    'estimated_hours' => rand(2, 16),
                    'actual_hours' => rand(1, 12),
                    'notes' => 'Sample task notes for demonstration purposes.',
                ]);
            }
        }
    }
}
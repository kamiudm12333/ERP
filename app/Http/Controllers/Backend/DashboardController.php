<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts for dashboard
        $totalClients = Client::count();
        $activeClients = Client::where('status', 'active')->count();
        $prospectClients = Client::where('status', 'prospect')->count();

        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 'active')->count();
        $graduatedStudents = Student::where('status', 'graduated')->count();

        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('status', 'active')->count();

        $totalProjects = Project::count();
        $activeProjects = Project::where('status', 'active')->count();
        $completedProjects = Project::where('status', 'completed')->count();

        $totalTasks = Task::count();
        $pendingTasks = Task::where('status', 'pending')->count();
        $completedTasks = Task::where('status', 'completed')->count();

        // Get recent activities
        $recentClients = Client::latest()->take(5)->get();
        $recentStudents = Student::latest()->take(5)->get();
        $recentProjects = Project::with('client')->latest()->take(5)->get();
        $recentTasks = Task::with('project')->latest()->take(5)->get();

        // Get upcoming follow-ups
        $upcomingFollowUps = Client::where('next_follow_up', '>=', now())
            ->where('next_follow_up', '<=', now()->addDays(7))
            ->orderBy('next_follow_up')
            ->take(5)
            ->get();

        // Get overdue tasks
        $overdueTasks = Task::where('due_date', '<', now())
            ->where('status', '!=', 'completed')
            ->orderBy('due_date')
            ->take(5)
            ->get();

        return view('backend.dashboard', compact(
            'totalClients',
            'activeClients',
            'prospectClients',
            'totalStudents',
            'activeStudents',
            'graduatedStudents',
            'totalEmployees',
            'activeEmployees',
            'totalProjects',
            'activeProjects',
            'completedProjects',
            'totalTasks',
            'pendingTasks',
            'completedTasks',
            'recentClients',
            'recentStudents',
            'recentProjects',
            'recentTasks',
            'upcomingFollowUps',
            'overdueTasks'
        ));
    }
}
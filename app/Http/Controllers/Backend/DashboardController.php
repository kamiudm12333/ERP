<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_clients' => Client::count(),
            'active_clients' => Client::where('status', 'active')->count(),
            'total_students' => Student::count(),
            'active_students' => Student::where('status', 'active')->count(),
            'total_employees' => Employee::count(),
            'active_employees' => Employee::where('status', 'active')->count(),
            'total_projects' => Project::count(),
            'active_projects' => Project::where('status', 'active')->count(),
            'total_users' => User::count(),
        ];

        $recent_clients = Client::with('assignedUser')->latest()->take(5)->get();
        $recent_students = Student::with('assignedUser')->latest()->take(5)->get();
        $recent_employees = Employee::with('assignedUser')->latest()->take(5)->get();
        $recent_projects = Project::with(['client', 'employee', 'student'])->latest()->take(5)->get();

        $upcoming_followups = Client::where('next_follow_up', '>=', now())
            ->where('next_follow_up', '<=', now()->addDays(7))
            ->orderBy('next_follow_up')
            ->take(5)
            ->get();

        return view('backend.dashboard', compact(
            'stats',
            'recent_clients',
            'recent_students',
            'recent_employees',
            'recent_projects',
            'upcoming_followups'
        ));
    }
}
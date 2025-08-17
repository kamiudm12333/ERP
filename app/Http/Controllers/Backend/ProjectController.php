<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['client', 'employee', 'student', 'assignedUser'])->latest()->paginate(10);
        return view('backend.projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        $employees = Employee::all();
        $students = Student::all();
        return view('backend.projects.create', compact('users', 'clients', 'employees', 'students'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'client_id' => 'nullable|exists:clients,id',
            'employee_id' => 'nullable|exists:employees,id',
            'student_id' => 'nullable|exists:students,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:planning,active,on_hold,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
            'budget' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        $project->load(['client', 'employee', 'student', 'assignedUser']);
        return view('backend.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $users = User::all();
        $clients = Client::all();
        $employees = Employee::all();
        $students = Student::all();
        return view('backend.projects.edit', compact('project', 'users', 'clients', 'employees', 'students'));
    }

    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'client_id' => 'nullable|exists:clients,id',
            'employee_id' => 'nullable|exists:employees,id',
            'student_id' => 'nullable|exists:students,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:planning,active,on_hold,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
            'budget' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
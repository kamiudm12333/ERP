<?php

require_once 'vendor/autoload.php';

use App\Models\User;
use App\Models\Client;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🏢 Office Management System - Data Overview\n";
echo "==========================================\n\n";

// Users
$users = User::count();
echo "👥 Users: {$users}\n";

// Clients
$clients = Client::count();
$activeClients = Client::where('status', 'active')->count();
echo "🏢 Clients: {$clients} (Active: {$activeClients})\n";

// Students
$students = Student::count();
$activeStudents = Student::where('status', 'active')->count();
echo "🎓 Students: {$students} (Active: {$activeStudents})\n";

// Employees
$employees = Employee::count();
$activeEmployees = Employee::where('status', 'active')->count();
echo "👨‍💼 Employees: {$employees} (Active: {$activeEmployees})\n";

// Projects
$projects = Project::count();
$activeProjects = Project::where('status', 'active')->count();
echo "📋 Projects: {$projects} (Active: {$activeProjects})\n";

// Tasks
$tasks = Task::count();
$pendingTasks = Task::where('status', 'pending')->count();
echo "✅ Tasks: {$tasks} (Pending: {$pendingTasks})\n";

echo "\n🚀 System is ready! Access it at: http://localhost:8000\n";
echo "📧 Login with: admin@office.com / password\n";
echo "🔑 Other users: john@office.com, sarah@office.com, mike@office.com\n";
echo "🔑 All passwords: password\n";
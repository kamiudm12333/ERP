@extends('layouts.app')

@section('content')
@include('components.office-navigation')

<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Office Management Dashboard</h1>
        <p class="text-gray-600 mt-2">Welcome to your comprehensive office management system</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Clients Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Clients</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $totalClients }}</p>
                    <p class="text-xs text-gray-500">{{ $activeClients }} active, {{ $prospectClients }} prospects</p>
                </div>
            </div>
        </div>

        <!-- Students Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Students</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $totalStudents }}</p>
                    <p class="text-xs text-gray-500">{{ $activeStudents }} active, {{ $graduatedStudents }} graduated</p>
                </div>
            </div>
        </div>

        <!-- Employees Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Employees</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $totalEmployees }}</p>
                    <p class="text-xs text-gray-500">{{ $activeEmployees }} active</p>
                </div>
            </div>
        </div>

        <!-- Projects Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Projects</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $totalProjects }}</p>
                    <p class="text-xs text-gray-500">{{ $activeProjects }} active, {{ $completedProjects }} completed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tasks Overview</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Total Tasks</span>
                    <span class="font-semibold">{{ $totalTasks }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Pending</span>
                    <span class="font-semibold text-yellow-600">{{ $pendingTasks }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Completed</span>
                    <span class="font-semibold text-green-600">{{ $completedTasks }}</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('clients.create') }}" class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                    Add New Client
                </a>
                <a href="{{ route('students.create') }}" class="block w-full bg-green-600 text-white text-center py-2 px-4 rounded-md hover:bg-green-700 transition duration-200">
                    Add New Student
                </a>
                <a href="{{ route('employees.create') }}" class="block w-full bg-purple-600 text-white text-center py-2 px-4 rounded-md hover:bg-purple-700 transition duration-200">
                    Add New Employee
                </a>
                <a href="{{ route('projects.create') }}" class="block w-full bg-orange-600 text-white text-center py-2 px-4 rounded-md hover:bg-orange-700 transition duration-200">
                    Create New Project
                </a>
            </div>
        </div>

        <!-- Upcoming Follow-ups -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Upcoming Follow-ups</h3>
            @if($upcomingFollowUps->count() > 0)
                <div class="space-y-2">
                    @foreach($upcomingFollowUps as $client)
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">{{ $client->name }}</span>
                            <span class="text-blue-600">{{ $client->next_follow_up->format('M d') }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-500">No upcoming follow-ups</p>
            @endif
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Clients -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Clients</h3>
            @if($recentClients->count() > 0)
                <div class="space-y-3">
                    @foreach($recentClients as $client)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                            <div>
                                <p class="font-medium text-gray-900">{{ $client->name }}</p>
                                <p class="text-sm text-gray-600">{{ $client->company ?? 'No Company' }}</p>
                            </div>
                            <span class="px-2 py-1 text-xs rounded-full 
                                @if($client->status === 'active') bg-green-100 text-green-800
                                @elseif($client->status === 'prospect') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($client->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-500">No recent clients</p>
            @endif
        </div>

        <!-- Recent Projects -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Projects</h3>
            @if($recentProjects->count() > 0)
                <div class="space-y-3">
                    @foreach($recentProjects as $project)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                            <div>
                                <p class="font-medium text-gray-900">{{ $project->name }}</p>
                                <p class="text-sm text-gray-600">{{ $project->client->name }}</p>
                            </div>
                            <div class="text-right">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($project->status === 'active') bg-green-100 text-green-800
                                    @elseif($project->status === 'completed') bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($project->status) }}
                                </span>
                                <p class="text-xs text-gray-500 mt-1">{{ $project->progress }}%</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-500">No recent projects</p>
            @endif
        </div>
    </div>

    <!-- Overdue Tasks Alert -->
    @if($overdueTasks->count() > 0)
        <div class="mt-8 bg-red-50 border border-red-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-red-900 mb-4">⚠️ Overdue Tasks</h3>
            <div class="space-y-2">
                @foreach($overdueTasks as $task)
                    <div class="flex items-center justify-between p-3 bg-red-100 rounded-md">
                        <div>
                            <p class="font-medium text-red-900">{{ $task->title }}</p>
                            <p class="text-sm text-red-700">{{ $task->project->name }}</p>
                        </div>
                        <span class="text-sm text-red-600">
                            Due: {{ $task->due_date->format('M d, Y') }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-6">Office Management Dashboard</h2>
                
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-100 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-500 text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Clients</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_clients'] }}</p>
                                <p class="text-sm text-gray-500">{{ $stats['active_clients'] }} active</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-green-100 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-500 text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 5.477 5.754 5 7.5 5s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 19 16.5 19c-1.746 0-3.332-.477-4.5-1.253"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Students</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_students'] }}</p>
                                <p class="text-sm text-gray-500">{{ $stats['active_students'] }} active</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-purple-100 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-500 text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Employees</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_employees'] }}</p>
                                <p class="text-sm text-gray-500">{{ $stats['active_employees'] }} active</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-yellow-100 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-500 text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Projects</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_projects'] }}</p>
                                <p class="text-sm text-gray-500">{{ $stats['active_projects'] }} active</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('clients.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-center">
                            Add Client
                        </a>
                        <a href="{{ route('students.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-center">
                            Add Student
                        </a>
                        <a href="{{ route('employees.create') }}" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-center">
                            Add Employee
                        </a>
                        <a href="{{ route('projects.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-center">
                            Add Project
                        </a>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Clients -->
                    <div class="bg-white border rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">Recent Clients</h3>
                        @if($recent_clients->count() > 0)
                            @foreach($recent_clients as $client)
                            <div class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="font-medium">{{ $client->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $client->company ?? 'No Company' }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full {{ $client->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($client->status) }}
                                </span>
                            </div>
                            @endforeach
                        @else
                            <p class="text-gray-500">No recent clients</p>
                        @endif
                        <a href="{{ route('clients.index') }}" class="text-blue-500 hover:text-blue-600 text-sm mt-4 inline-block">View All Clients →</a>
                    </div>

                    <!-- Recent Students -->
                    <div class="bg-white border rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">Recent Students</h3>
                        @if($recent_students->count() > 0)
                            @foreach($recent_students as $student)
                            <div class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="font-medium">{{ $student->full_name }}</p>
                                    <p class="text-sm text-gray-500">{{ $student->studentClass->name ?? 'No Class' }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full {{ $student->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($student->status) }}
                                </span>
                            </div>
                            @endforeach
                        @else
                            <p class="text-gray-500">No recent students</p>
                        @endif
                        <a href="{{ route('students.index') }}" class="text-green-500 hover:text-green-600 text-sm mt-4 inline-block">View All Students →</a>
                    </div>
                </div>

                <!-- Upcoming Follow-ups -->
                @if($upcoming_followups->count() > 0)
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">Upcoming Follow-ups (Next 7 Days)</h3>
                    <div class="bg-white border rounded-lg p-6">
                        @foreach($upcoming_followups as $client)
                        <div class="flex items-center justify-between py-2 border-b">
                            <div>
                                <p class="font-medium">{{ $client->name }}</p>
                                <p class="text-sm text-gray-500">{{ $client->next_follow_up->format('M d, Y') }}</p>
                            </div>
                            <a href="{{ route('clients.show', $client) }}" class="text-blue-500 hover:text-blue-600 text-sm">View Details</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
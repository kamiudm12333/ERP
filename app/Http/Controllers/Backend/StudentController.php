<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['assignedUser', 'studentClass', 'studentYear'])->latest()->paginate(10);
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        $users = User::all();
        $classes = StudentClass::all();
        $years = StudentYear::all();
        return view('backend.students.create', compact('users', 'classes', 'years'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:students',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'emergency_contact_relationship' => 'nullable|string|max:100',
            'enrollment_date' => 'nullable|date',
            'status' => 'required|in:enrolled,active,inactive,graduated,withdrawn',
            'student_class_id' => 'nullable|exists:student_classes,id',
            'student_year_id' => 'nullable|exists:student_years,id',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        $student->load(['assignedUser', 'studentClass', 'studentYear']);
        return view('backend.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $users = User::all();
        $classes = StudentClass::all();
        $years = StudentYear::all();
        return view('backend.students.edit', compact('student', 'users', 'classes', 'years'));
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'emergency_contact_relationship' => 'nullable|string|max:100',
            'enrollment_date' => 'nullable|date',
            'status' => 'required|in:enrolled,active,inactive,graduated,withdrawn',
            'student_class_id' => 'nullable|exists:student_classes,id',
            'student_year_id' => 'nullable|exists:student_years,id',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
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
        $students = Student::with(['studentClass', 'studentYear', 'assignedEmployee'])->latest()->paginate(15);
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        $classes = StudentClass::all();
        $years = StudentYear::all();
        $employees = User::where('role', 'employee')->orWhere('role', 'admin')->get();
        return view('backend.students.create', compact('classes', 'years', 'employees'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|string|unique:students,student_id|max:50',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
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
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,inactive,graduated,transferred',
            'class_id' => 'nullable|exists:student_classes,id',
            'year_id' => 'nullable|exists:student_years,id',
            'assigned_to' => 'nullable|exists:users,id',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        $student->load(['studentClass', 'studentYear', 'assignedEmployee']);
        return view('backend.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classes = StudentClass::all();
        $years = StudentYear::all();
        $employees = User::where('role', 'employee')->orWhere('role', 'admin')->get();
        return view('backend.students.edit', compact('student', 'classes', 'years', 'employees'));
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|string|unique:students,student_id,' . $student->id . '|max:50',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,' . $student->id,
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
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,inactive,graduated,transferred',
            'class_id' => 'nullable|exists:student_classes,id',
            'year_id' => 'nullable|exists:student_years,id',
            'assigned_to' => 'nullable|exists:users,id',
            'notes' => 'nullable|string'
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
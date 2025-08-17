<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['studentClass', 'studentYear'])->latest()->get();
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        $studentClasses = StudentClass::all();
        $studentYears = StudentYear::all();
        return view('backend.students.create', compact('studentClasses', 'studentYears'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'student_id' => 'required|string|unique:students,student_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_email' => 'nullable|email',
            'student_class_id' => 'required|exists:student_classes,id',
            'student_year_id' => 'required|exists:student_years,id',
            'admission_date' => 'required|date',
            'status' => 'required|in:active,inactive,graduated,transferred',
            'fees_paid' => 'nullable|numeric|min:0',
            'fees_pending' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        Student::create($validateData);

        $notification = array(
            'message' => 'Student Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('students.index')->with($notification);
    }

    public function show(Student $student)
    {
        $student->load(['studentClass', 'studentYear']);
        return view('backend.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $studentClasses = StudentClass::all();
        $studentYears = StudentYear::all();
        return view('backend.students.edit', compact('student', 'studentClasses', 'studentYears'));
    }

    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'student_id' => 'required|string|unique:students,student_id,' . $student->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_email' => 'nullable|email',
            'student_class_id' => 'required|exists:student_classes,id',
            'student_year_id' => 'required|exists:student_years,id',
            'admission_date' => 'required|date',
            'status' => 'required|in:active,inactive,graduated,transferred',
            'fees_paid' => 'nullable|numeric|min:0',
            'fees_pending' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $student->update($validateData);

        $notification = array(
            'message' => 'Student Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('students.index')->with($notification);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        $notification = array(
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('students.index')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('backend.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('backend.employees.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'employee_id' => 'required|string|unique:employees,employee_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
            'termination_date' => 'nullable|date|after:hire_date',
            'employment_type' => 'required|in:full-time,part-time,contract,intern',
            'status' => 'required|in:active,inactive,terminated,on-leave',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'skills' => 'nullable|string',
            'notes' => 'nullable|string'
        ]);

        Employee::create($validateData);

        $notification = array(
            'message' => 'Employee Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employees.index')->with($notification);
    }

    public function show(Employee $employee)
    {
        return view('backend.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('backend.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validateData = $request->validate([
            'employee_id' => 'required|string|unique:employees,employee_id,' . $employee->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
            'termination_date' => 'nullable|date|after:hire_date',
            'employment_type' => 'required|in:full-time,part-time,contract,intern',
            'status' => 'required|in:active,inactive,terminated,on-leave',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'skills' => 'nullable|string',
            'notes' => 'nullable|string'
        ]);

        $employee->update($validateData);

        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('employees.index')->with($notification);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('employees.index')->with($notification);
    }
}

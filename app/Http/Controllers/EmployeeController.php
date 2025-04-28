<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    // READ - Displaye all employees

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // CREATE - show form to add a new employye

    public function create()
    {
        return view('employees.create');
    }

    // STORE - store new employee in the DT

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    // UPDATE - save update employee

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,'.$id,
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee Updated Successfully.');
    }

    // DELETE - delete the employee

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee Deleted Successfully.');
    }
}

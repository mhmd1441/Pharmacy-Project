<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;


class EmployeeController extends Controller
{
    // READ - Displaye all employees

    public function index()
    {
        $employees = Employees::all();
        return view('admin.createEmployee', compact('employees'));
    }

    // CREATE - show form to add a new employye

    public function create()
    {
        return view('employees.create');
    }



   public function store(Request $request)
   {
    // Validation for the incoming data
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email',
        'mobile_number' => 'required|numeric',
        'role' => 'required|string',
        'status' => 'required|string',
        'hire_date' => 'required|date',
        'password' => 'required|string|confirmed', // Ensuring password confirmation
    ]);

    // Create the new employee with the form data
    Employees::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'mobile_number' => $request->mobile_number,
        'role' => $request->role,
        'status' => $request->status,
        'hire_date' => $request->hire_date,
        'password' => bcrypt($request->password),  // Encrypt the password
    ]);

    // Redirect to the employees index page with a success message
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

        $employee = Employees::findOrFail($id);
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

    // SEARCH 
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Searching in name and email fields
        $employees = Employees::where('name', 'like', "%{$keyword}%")
            ->orWhere('email', 'like', "%{$keyword}%")
            ->get();

        // Returning the search results to the view
        return view('employees.index', compact('employees'));
    }

}

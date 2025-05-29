<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;


class EmployeeController extends Controller
{


    // READ - Displaye all employees
    // public function index()
    // {
    //     $employees = Employees::all();
    //     return view('admin.viewEmployees', compact('employees'));
    // }


    public function index(Request $request)
   {
    $query = Employees::query();

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->where('first_name', 'LIKE', "%{$search}%")
              ->orWhere('last_name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
        });
    }

    if ($request->filled('role')) {
        $query->where('role', $request->input('role'));
    }

    if ($request->filled('status')) {
        $query->where('status', $request->input('status'));
    }

    // جلب الموظفين حسب الفلترة والبحث
    $employees = $query->get();

    // حساب العدد الكلي للموظفين بعد الفلترة
    $totalEmployees = $employees->count();

    // إرسال البيانات للعرض في الصفحة
    return view('admin.viewEmployees', compact('employees', 'totalEmployees'));
   }






    // CREATE - show form to add a new employye
    public function create()
    {
        return view('employees.create');
    }



    // STORE - Save the new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:employees,email',
            'mobile_number' => 'required|string|max:20|unique:employees,mobile_number',
            'role' => 'required|in:pharmacist,manager,driver',
            'status' => 'required|in:active,onLeave',
            'hire_date' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Employees::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'role' => $request->role,
            'status' => $request->status,
            'hire_date' => $request->hire_date,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('adminDashboard')->with('success', 'Employee added successfully.');
    }


    public function update(Request $request, $id)
    {
    // Investigate the required data
    $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|email|max:50|unique:employees,email,' . $id,
        'mobile_number' => 'required|string|max:20|unique:employees,mobile_number,' . $id,
        'role' => 'required|in:pharmacist,manager,driver',
        'status' => 'required|in:active,onLeave',
        'hire_date' => 'required|date',
    ]);

    // Call the Employees 
    $employee = Employees::findOrFail($id);

    // Update the Data 
    $employee->first_name = $request->first_name;
    $employee->last_name = $request->last_name;
    $employee->email = $request->email;
    $employee->mobile_number = $request->mobile_number;
    $employee->role = $request->role;
    $employee->status = $request->status;
    $employee->hire_date = $request->hire_date;

    $employee->save();

    // Return to Employees View 
    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }


    // DELETE - delete the employee
    public function destroy($id)
    {
    $employee = Employees::findOrFail($id);
    $employee->delete();

    return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
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



    // EDit - SHow the employee details 
    public function edit($id)
    {
    $employee = Employees::findOrFail($id);
    return view('employees.editEmployee', compact('employee'));
    }

}

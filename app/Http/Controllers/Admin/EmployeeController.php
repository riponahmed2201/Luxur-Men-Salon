<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::latest()->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function create(): View
    {
        return view('admin.employees.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'monthly_salary' => 'required|numeric|min:0',
        ]);

        try {
            Employee::create($request->all());
            notify()->success('Employee added successfully.', 'Success');
            return redirect()->route('admin.employees.index');
        } catch (Exception $e) {
            notify()->error('Failed to add employee.', 'Error');
            return back()->withInput();
        }
    }

    public function edit(Employee $employee): View
    {
        return view('admin.employees.form', compact('employee'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'monthly_salary' => 'required|numeric|min:0',
        ]);

        try {
            $employee->update($request->all());
            notify()->success('Employee updated successfully.', 'Success');
            return redirect()->route('admin.employees.index');
        } catch (Exception $e) {
            notify()->error('Failed to update employee.', 'Error');
            return back()->withInput();
        }
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        try {
            $employee->delete();
            notify()->success('Employee removed successfully.', 'Success');
        } catch (Exception $e) {
            notify()->error('Failed to remove employee.', 'Error');
        }
        return back();
    }
}

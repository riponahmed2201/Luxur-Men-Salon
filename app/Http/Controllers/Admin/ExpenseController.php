<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExpenseController extends Controller
{
    public function index(): View
    {
        $expenses = Expense::latest()->get();
        return view('admin.expenses.index', compact('expenses'));
    }

    public function create(): View
    {
        return view('admin.expenses.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'purpose' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
        ]);

        try {
            Expense::create($request->all());
            notify()->success('Expense recorded successfully.', 'Success');
            return redirect()->route('admin.expenses.index');
        } catch (Exception $e) {
            notify()->error('Failed to record expense.', 'Error');
            return back()->withInput();
        }
    }

    public function edit(Expense $expense): View
    {
        return view('admin.expenses.form', compact('expense'));
    }

    public function update(Request $request, Expense $expense): RedirectResponse
    {
        $request->validate([
            'purpose' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
        ]);

        try {
            $expense->update($request->all());
            notify()->success('Expense updated successfully.', 'Success');
            return redirect()->route('admin.expenses.index');
        } catch (Exception $e) {
            notify()->error('Failed to update expense.', 'Error');
            return back()->withInput();
        }
    }

    public function destroy(Expense $expense): RedirectResponse
    {
        try {
            $expense->delete();
            notify()->success('Expense record deleted.', 'Success');
        } catch (Exception $e) {
            notify()->error('Failed to delete expense record.', 'Error');
        }
        return back();
    }
}

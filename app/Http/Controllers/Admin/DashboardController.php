<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Billing;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $todaySale = Billing::whereDate('created_at', Carbon::today())->sum('net_amount');
        $thisMonthIncome = Billing::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('net_amount');
        $totalEmployees = Employee::count();
        $totalServices = Service::count();

        // Simple Profit/Loss summary for current month
        $monthlyExpenses = \App\Models\Expense::whereMonth('expense_date', Carbon::now()->month)
            ->whereYear('expense_date', Carbon::now()->year)
            ->sum('amount');
        $monthlySalaries = Employee::sum('monthly_salary');
        $monthlyProfit = $thisMonthIncome - ($monthlyExpenses + $monthlySalaries);

        return view('admin.dashboard', compact(
            'todaySale',
            'thisMonthIncome',
            'totalEmployees',
            'totalServices',
            'monthlyProfit'
        ));
    }
}

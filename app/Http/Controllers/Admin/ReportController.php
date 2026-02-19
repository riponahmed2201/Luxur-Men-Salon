<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Employee;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(Request $request): View
    {
        $date = $request->date ? Carbon::parse($request->date) : Carbon::today();
        $month = $request->month ? Carbon::parse($request->month) : Carbon::now();
        $year = $request->year ?? date('Y');

        // Stats
        $dailyIncome = Billing::whereDate('created_at', $date)->sum('net_amount');
        $monthlyIncome = Billing::whereYear('created_at', $month->year)->whereMonth('created_at', $month->month)->sum('net_amount');
        $yearlyIncome = Billing::whereYear('created_at', $year)->sum('net_amount');

        $monthlyExpenses = Expense::whereYear('expense_date', $month->year)->whereMonth('expense_date', $month->month)->sum('amount');
        $monthlySalaries = Employee::sum('monthly_salary'); // Fixed cost per month

        $monthlyProfit = $monthlyIncome - ($monthlyExpenses + $monthlySalaries);

        // Service-wise Analysis
        $serviceStats = \App\Models\Service::withCount('billingItems')->get();

        return view('admin.reports.index', compact(
            'dailyIncome',
            'monthlyIncome',
            'yearlyIncome',
            'monthlyProfit',
            'monthlyExpenses',
            'monthlySalaries',
            'serviceStats',
            'date',
            'month',
            'year'
        ));
    }
}

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

        // Profit/Loss
        $monthlyExpenses = \App\Models\Expense::whereMonth('expense_date', Carbon::now()->month)
            ->whereYear('expense_date', Carbon::now()->year)
            ->sum('amount');
        $monthlySalaries = Employee::sum('monthly_salary');
        $monthlyProfit = $thisMonthIncome - ($monthlyExpenses + $monthlySalaries);

        // 7-day sales trend
        $salesTrend = [];
        $salesLabels = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $salesLabels[] = $date->format('D, d M');
            $salesTrend[] = Billing::whereDate('created_at', $date)->sum('net_amount');
        }

        // Recent Billings
        $recentBillings = Billing::latest()->take(5)->get();

        // Popular Services (Top 5)
        $popularServices = Service::withCount('billingItems')
            ->orderBy('billing_items_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'todaySale',
            'thisMonthIncome',
            'totalEmployees',
            'totalServices',
            'monthlyProfit',
            'salesTrend',
            'salesLabels',
            'recentBillings',
            'popularServices'
        ));
    }
}

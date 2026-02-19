@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="'Financial Reports'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Reports', 'active' => true]]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <!-- Filter -->
        <div class="card mb-5">
            <div class="card-body">
                <form action="" method="GET" class="row align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">Select Month</label>
                        <input type="month" name="month" class="form-control" value="{{ $month->format('Y-m') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Stats Rows -->
        <div class="row g-5 mb-5">
            <div class="col-md-4">
                <div class="card bg-light-primary border-primary border-dashed">
                    <div class="card-body">
                        <h3 class="card-title text-primary">Monthly Income</h3>
                        <div class="fs-2hx fw-bolder">{{ number_format($monthlyIncome, 2) }} TK</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light-danger border-danger border-dashed">
                    <div class="card-body">
                        <h3 class="card-title text-danger">Monthly Expenses</h3>
                        <div class="fs-2hx fw-bolder">{{ number_format($monthlyExpenses + $monthlySalaries, 2) }} TK</div>
                        <small>(Expenses: {{ number_format($monthlyExpenses,2) }} + Salaries: {{ number_format($monthlySalaries,2) }})</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light-success border-success border-dashed">
                    <div class="card-body">
                        <h3 class="card-title text-success">Net Profit</h3>
                        <div class="fs-2hx fw-bolder">{{ number_format($monthlyProfit, 2) }} TK</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <!-- Service Analysis -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Service Popularity Analysis</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-row-bordered">
                                <thead>
                                    <tr class="fw-bold text-gray-800">
                                        <th>Service Name</th>
                                        <th>Usage Count</th>
                                        <th>Estimated Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($serviceStats as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->billing_items_count }} times</td>
                                        <td>{{ number_format($service->billing_items_count * $service->price, 2) }} TK</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daily Snapshot -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary">
                        <h3 class="card-title text-white">Today's Snapshot</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-stack mb-5">
                            <span class="fw-bold">Today's Income:</span>
                            <span class="fs-4 fw-bolder">{{ number_format($dailyIncome, 2) }} TK</span>
                        </div>
                        <div class="d-flex flex-stack">
                            <span class="fw-bold">Total Sales (Year):</span>
                            <span class="fs-4 fw-bolder">{{ number_format($yearlyIncome, 2) }} TK</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
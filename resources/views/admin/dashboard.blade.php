@extends('admin.layouts.app')

@section('content')
<!--begin::Toolbar -->
<x-toolbar :title="'Dashboard'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Dashboard', 'active' => true]]" />
<!--end::Toolbar -->

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <!-- Main Stats -->
        <div class="row g-5 g-xl-8 mb-5">
            <div class="col-xl-3">
                <div class="card bg-success hoverable card-xl-stretch shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-cash-stack fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Today's Sales</div>
                        <div class="fw-bold text-white fs-3">{{ number_format($todaySale ?? 0, 2) }} TK</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card bg-primary hoverable card-xl-stretch shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-currency-dollar fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Monthly Income</div>
                        <div class="fw-bold text-white fs-3">{{ number_format($thisMonthIncome ?? 0, 2) }} TK</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card bg-info hoverable card-xl-stretch shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-graph-up-arrow fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Monthly Net Profit</div>
                        <div class="fw-bold text-white fs-3">{{ number_format($monthlyProfit ?? 0, 2) }} TK</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card bg-dark hoverable card-xl-stretch shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-people fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Total Employees</div>
                        <div class="fw-bold text-white fs-3">{{ $totalEmployees ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 g-xl-8 mb-5">
            <!-- Sales Chart -->
            <div class="col-xl-8">
                <div class="card shadow-sm card-xl-stretch">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Sales Trend (Last 7 Days)</span>
                            <span class="text-muted fw-bold fs-7">Daily revenue performance</span>
                        </h3>
                    </div>
                    <div class="card-body pb-0">
                        <canvas id="salesTrendsChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Popular Services -->
            <div class="col-xl-4">
                <div class="card shadow-sm card-xl-stretch">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Popular Services</span>
                            <span class="text-muted fw-bold fs-7">Most booked services</span>
                        </h3>
                    </div>
                    <div class="card-body pt-5">
                        @foreach($popularServices as $service)
                        <div class="d-flex align-items-center mb-7">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-light-primary">
                                    <i class="bi bi-scissors fs-2x text-primary"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $service->name }}</a>
                                <span class="text-muted d-block fw-bold">{{ $service->billing_items_count }} bookings</span>
                            </div>
                            <span class="badge badge-light-success fs-8 fw-bolder">{{ number_format($service->price, 0) }} TK</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 g-xl-8">
            <!-- Recent Billings -->
            <div class="col-xl-8">
                <div class="card shadow-sm card-xl-stretch">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Recent Billings</span>
                            <span class="text-muted fw-bold fs-7">Latest 5 salon transactions</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr class="fw-bolder text-muted">
                                        <th class="min-w-100px">Bill #</th>
                                        <th class="min-w-150px">Customer</th>
                                        <th class="min-w-100px">Amount</th>
                                        <th class="min-w-100px">Date</th>
                                        <th class="min-w-100px text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentBillings as $bill)
                                    <tr>
                                        <td>
                                            <span class="text-dark fw-bolder d-block fs-6">{{ $bill->bill_number }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark fw-bold d-block fs-6">{{ $bill->customer_name ?? 'Walk-in' }}</span>
                                            <span class="text-muted fw-bold fs-7">{{ $bill->customer_mobile }}</span>
                                        </td>
                                        <td>
                                            <span class="text-primary fw-bolder d-block fs-6">{{ number_format($bill->net_amount, 2) }} TK</span>
                                        </td>
                                        <td>
                                            <span class="text-muted fw-bold d-block fs-7">{{ $bill->created_at->format('d M, h:i A') }}</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.billings.show', $bill->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="bi bi-eye fs-3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-xl-4">
                <div class="card shadow-sm card-xl-stretch">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title fw-bolder">Quick Actions</h3>
                    </div>
                    <div class="card-body pt-5">
                        <div class="d-grid gap-3">
                            <a href="{{ route('admin.billings.create') }}" class="btn btn-primary d-flex align-items-center py-4">
                                <i class="bi bi-receipt fs-2 me-3"></i>
                                <span class="fw-bolder fs-6">New Billing Receipt</span>
                            </a>
                            <a href="{{ route('admin.expenses.create') }}" class="btn btn-danger d-flex align-items-center py-4">
                                <i class="bi bi-wallet2 fs-2 me-3"></i>
                                <span class="fw-bolder fs-6">Add Daily Expense</span>
                            </a>
                            <a href="{{ route('admin.reports.index') }}" class="btn btn-success d-flex align-items-center py-4">
                                <i class="bi bi-file-earmark-bar-graph fs-2 me-3"></i>
                                <span class="fw-bolder fs-6">View Financial Reports</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('salesTrendsChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($salesLabels),
            datasets: [{
                label: 'Daily Sales (TK)',
                data: @json($salesTrend),
                backgroundColor: 'rgba(25, 135, 84, 0.1)',
                borderColor: 'rgba(25, 135, 84, 1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: 'rgba(25, 135, 84, 1)',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + ' TK';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush
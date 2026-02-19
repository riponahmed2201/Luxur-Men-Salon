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

        <div class="row g-5 g-xl-8">
            <!-- Services Count -->
            <div class="col-xl-4">
                <a href="{{ route('admin.services.index') }}" class="card bg-warning hoverable card-xl-stretch shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-tools fs-1 text-white"></i>
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Active Services</div>
                        <div class="fw-bold text-white fs-3">{{ $totalServices ?? 0 }}</div>
                    </div>
                </a>
            </div>

            <!-- Quick Actions -->
            <div class="col-xl-8">
                <div class="card shadow-sm card-xl-stretch">
                    <div class="card-header">
                        <h3 class="card-title fw-bolder">Quick Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('admin.billings.create') }}" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary w-100 py-5">
                                    <i class="bi bi-receipt fs-2x mb-3"></i><br>
                                    New Billing
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.reports.index') }}" class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success w-100 py-5">
                                    <i class="bi bi-file-earmark-bar-graph fs-2x mb-3"></i><br>
                                    View Reports
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.expenses.create') }}" class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger w-100 py-5">
                                    <i class="bi bi-wallet2 fs-2x mb-3"></i><br>
                                    Add Expense
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
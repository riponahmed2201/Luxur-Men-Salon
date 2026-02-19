@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="isset($employee) ? 'Edit Employee' : 'Add Employee'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Employees', 'url' => route('admin.employees.index')],
        ['label' => isset($employee) ? 'Edit Employee' : 'Add Employee', 'active' => true],
    ]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="card-label">{{ isset($employee) ? 'Edit Employee' : 'Add New Employee' }}</h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>

            <div class="card-body py-4">
                <form method="POST" action="{{ isset($employee) ? route('admin.employees.update', $employee->id) : route('admin.employees.store') }}">
                    @csrf
                    @if(isset($employee))
                    @method('PUT')
                    @endif

                    <div class="row mb-6">
                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Employee Name</label>
                            <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Enter employee name" value="{{ old('name', $employee->name ?? '') }}" required />
                            @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control form-control-solid @error('mobile') is-invalid @enderror" placeholder="Enter mobile number" value="{{ old('mobile', $employee->mobile ?? '') }}" required />
                            @error('mobile')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Designation</label>
                            <input type="text" name="designation" class="form-control form-control-solid @error('designation') is-invalid @enderror" placeholder="Enter designation (e.g. Barber)" value="{{ old('designation', $employee->designation ?? '') }}" required />
                            @error('designation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Monthly Salary (TK)</label>
                            <input type="number" step="0.01" name="monthly_salary" class="form-control form-control-solid @error('monthly_salary') is-invalid @enderror" placeholder="Enter monthly salary" value="{{ old('monthly_salary', $employee->monthly_salary ?? '') }}" required />
                            @error('monthly_salary')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center pt-10">
                        <button type="submit" class="btn btn-primary w-200px">
                            <span class="indicator-label">{{ isset($employee) ? 'Update Employee' : 'Save Employee' }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
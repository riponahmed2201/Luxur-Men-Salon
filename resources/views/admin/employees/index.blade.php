@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="'Employees'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Employees', 'active' => true]]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="card-label">Employee List</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">
                            <i class="bi bi-person-plus"></i> Add New Employee
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Designation</th>
                                <th>Monthly Salary</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @forelse($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->mobile }}</td>
                                <td>{{ $employee->designation }}</td>
                                <td>{{ number_format($employee->monthly_salary, 2) }} TK</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="bi bi-pencil fs-3"></i>
                                    </a>
                                    <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash fs-3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No employees found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
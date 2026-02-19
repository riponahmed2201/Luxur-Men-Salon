@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="isset($expense) ? 'Edit Expense' : 'Add Expense'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Expenses', 'url' => route('admin.expenses.index')],
        ['label' => isset($expense) ? 'Edit Expense' : 'Add Expense', 'active' => true],
    ]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="card-label">{{ isset($expense) ? 'Edit Expense' : 'Add New Expense' }}</h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.expenses.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>

            <div class="card-body py-4">
                <form method="POST" action="{{ isset($expense) ? route('admin.expenses.update', $expense->id) : route('admin.expenses.store') }}">
                    @csrf
                    @if(isset($expense))
                    @method('PUT')
                    @endif

                    <div class="row mb-6">
                        <div class="col-md-12 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Purpose / Description</label>
                            <input type="text" name="purpose" class="form-control form-control-solid @error('purpose') is-invalid @enderror" placeholder="e.g. Electricity Bill, Shop Rent" value="{{ old('purpose', $expense->purpose ?? '') }}" required />
                            @error('purpose')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Amount (TK)</label>
                            <input type="number" step="0.01" name="amount" class="form-control form-control-solid @error('amount') is-invalid @enderror" placeholder="Enter amount" value="{{ old('amount', $expense->amount ?? '') }}" required />
                            @error('amount')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Date</label>
                            <input type="date" name="expense_date" class="form-control form-control-solid @error('expense_date') is-invalid @enderror" value="{{ old('expense_date', $expense->expense_date ?? date('Y-m-d')) }}" required />
                            @error('expense_date')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center pt-10">
                        <button type="submit" class="btn btn-primary w-200px">
                            <span class="indicator-label">{{ isset($expense) ? 'Update Expense' : 'Save Expense' }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
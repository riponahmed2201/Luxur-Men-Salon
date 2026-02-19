@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="'Billings'" :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Billings', 'active' => true]]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="card-label">Billing History</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.billings.create') }}" class="btn btn-primary">
                            <i class="bi bi-receipt"></i> Create New Bill
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th>Bill #</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Discount</th>
                                <th>Net Amount</th>
                                <th>Date</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @forelse($billings as $billing)
                            <tr>
                                <td>{{ $billing->bill_number }}</td>
                                <td>
                                    {{ $billing->customer_name ?? 'N/A' }}<br>
                                    <small>{{ $billing->customer_mobile }}</small>
                                </td>
                                <td>{{ number_format($billing->total_amount, 2) }}</td>
                                <td>{{ number_format($billing->discount_amount, 2) }}</td>
                                <td class="text-primary">{{ number_format($billing->net_amount, 2) }} TK</td>
                                <td>{{ $billing->created_at->format('d M, Y h:i A') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.billings.show', $billing->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="bi bi-eye fs-3"></i>
                                    </a>
                                    <form action="{{ route('admin.billings.destroy', $billing->id) }}" method="POST" class="d-inline">
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
                                <td colspan="7" class="text-center">No billing records found.</td>
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
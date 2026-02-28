@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="'Billing Receipt'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Billings', 'url' => route('admin.billings.index')],
        ['label' => 'Receipt', 'active' => true],
    ]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-body p-lg-20">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                        <div class="mt-n1">
                            <div class="d-flex flex-stack pb-10">
                                <a href="#">
                                    <img alt="Logo" src="{{ asset('assets/logo/logo.png') }}" class="h-50px" />
                                    <h2 class="text-black ms-2">Luxur Men Salon</h2>
                                </a>
                                <button type="button" class="btn btn-success my-1" onclick="window.print();">Print Receipt</button>
                            </div>
                            <div class="m-0">
                                <div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #{{ $billing->bill_number }}</div>
                                <div class="row g-5 mb-11">
                                    <div class="col-sm-6">
                                        <div class="fw-bold fs-7 text-gray-600 mb-1">Issue Date:</div>
                                        <div class="fw-bolder fs-6 text-gray-800">{{ $billing->created_at->format('d M, Y') }}</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="fw-bold fs-7 text-gray-600 mb-1">Customer:</div>
                                        <div class="fw-bolder fs-6 text-gray-800">{{ $billing->customer_name ?? 'Walk-in Customer' }}</div>
                                        <div class="fw-bold fs-7 text-gray-600">{{ $billing->customer_mobile }}</div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="table-responsive border-bottom mb-9">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                                <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                    <th class="min-w-175px pb-2">Service</th>
                                                    <th class="min-w-100px text-end pb-2">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-bold text-gray-600">
                                                @foreach($billing->items as $item)
                                                <tr class="border-bottom">
                                                    <td>{{ $item->service->name }}</td>
                                                    <td class="text-end">{{ number_format($item->price, 2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="mw-300px">
                                            <div class="d-flex flex-stack mb-3">
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal:</div>
                                                <div class="text-end fw-bolder fs-6 text-gray-800">{{ number_format($billing->total_amount, 2) }}</div>
                                            </div>
                                            <div class="d-flex flex-stack mb-3">
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Discount:
                                                    @if($billing->discount_type === 'percentage')
                                                    ({{ $billing->discount_value }}%)
                                                    @endif
                                                </div>
                                                <div class="text-end fw-bolder fs-6 text-gray-800">- {{ number_format($billing->discount_amount, 2) }}</div>
                                            </div>
                                            <div class="d-flex flex-stack">
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Grand Total:</div>
                                                <div class="text-end fw-bolder fs-6 text-gray-800">{{ number_format($billing->net_amount, 2) }} TK</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @media print {

        .header,
        .footer,
        .aside,
        .toolbar,
        .btn {
            display: none !important;
        }

        .post {
            margin-top: 0 !important;
        }

        .card {
            border: none !important;
            box-shadow: none !important;
        }
    }
</style>
@endpush
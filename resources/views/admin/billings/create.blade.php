@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="'Create Bill'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Billings', 'url' => route('admin.billings.index')],
        ['label' => 'Create Bill', 'active' => true],
    ]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <form action="{{ route('admin.billings.store') }}" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Select Services</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-9">
                                    <select id="service-select" class="form-select form-select-solid" data-control="select2" data-placeholder="Choose a service">
                                        <option value="">Select Service</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }} ({{ $service->price }} TK)</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" id="add-service" class="btn btn-primary w-100">Add</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-row-bordered table-row-gray-300 align-middle">
                                    <thead>
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>Service</th>
                                            <th>Price</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="billing-items">
                                        <!-- Items will be added here via JS -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Customer & Payment</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-5">
                                <label class="form-label required">Customer Name</label>
                                <input type="text" name="customer_name" class="form-control form-control-solid @error('customer_name') is-invalid @enderror" placeholder="Enter customer name" value="{{ old('customer_name') }}" required />
                                @error('customer_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Customer Mobile</label>
                                <input type="text" name="customer_mobile" class="form-control form-control-solid" placeholder="Optional" />
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold">Subtotal:</span>
                                <span id="subtotal" class="text-end">0.00 TK</span>
                                <input type="hidden" id="subtotal-input" value="0">
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label class="form-label">Discount Type</label>
                                    <select name="discount_type" id="discount-type" class="form-select form-select-solid">
                                        <option value="fixed">Fixed Amount (TK)</option>
                                        <option value="percentage">Percentage (%)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Discount Value</label>
                                    <input type="number" step="0.01" name="discount_value" id="discount-input" class="form-control form-control-solid" value="0" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold">Total Discount:</span>
                                <span id="discount-amount-display" class="text-danger">0.00 TK</span>
                            </div>
                            <div class="d-flex justify-content-between fs-2 fw-bolder text-primary">
                                <span>Total:</span>
                                <span id="grand-total">0.00 TK</span>
                            </div>

                            <button type="submit" class="btn btn-success w-100 mt-10 fs-3">
                                <i class="bi bi-check-circle"></i> Complete Billing
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        let subtotal = 0;

        $('#add-service').click(function() {
            let select = $('#service-select');
            let serviceId = select.val();
            let serviceName = select.find('option:selected').text();
            let price = parseFloat(select.find('option:selected').data('price'));

            if (!serviceId) return;

            let row = `
                    <tr data-price="${price}">
                        <td>
                            ${serviceName}
                            <input type="hidden" name="services[]" value="${serviceId}">
                        </td>
                        <td>${price.toFixed(2)} TK</td>
                        <td class="text-end">
                            <button type="button" class="btn btn-icon btn-sm btn-light-danger remove-item">
                                <i class="bi bi-x fs-2"></i>
                            </button>
                        </td>
                    </tr>
                `;

            $('#billing-items').append(row);
            updateTotals();
        });

        $(document).on('click', '.remove-item', function() {
            $(this).closest('tr').remove();
            updateTotals();
        });

        $('#discount-input, #discount-type').on('input change', function() {
            updateTotals();
        });

        function updateTotals() {
            subtotal = 0;
            $('#billing-items tr').each(function() {
                subtotal += parseFloat($(this).data('price'));
            });

            let discountValue = parseFloat($('#discount-input').val()) || 0;
            let discountType = $('#discount-type').val();
            let discountAmount = 0;

            if (discountType === 'percentage') {
                discountAmount = (subtotal * discountValue) / 100;
            } else {
                discountAmount = discountValue;
            }

            let grandTotal = subtotal - discountAmount;

            $('#subtotal').text(subtotal.toFixed(2) + ' TK');
            $('#discount-amount-display').text(discountAmount.toFixed(2) + ' TK');
            $('#grand-total').text(grandTotal.toFixed(2) + ' TK');
        }
    });
</script>
@endpush
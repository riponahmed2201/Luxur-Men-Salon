@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Service Overview'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Services', 'url' => route('admin.services.index')],
        ['label' => 'Service Overview', 'active' => true],
    ]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <div class="card-body py-8">
                    <div class="row mb-5">

                        <!-- Service Category -->
                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Service Category</label>
                            <input type="text" class="form-control ready-only-input-color" readonly
                                value="{{ $service?->category?->name }}" />
                        </div>

                        <!-- Name -->
                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control ready-only-input-color" readonly
                                value="{{ $service->name }}" />
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Status</label>
                            <input type="text" class="form-control ready-only-input-color" readonly
                                value="{{ $service->status ? 'Active' : 'Inactive' }}" />
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Image</label>
                            <div class="mt-2">
                                <img id="imagePreview"
                                    src="{{ isset($service) && $service->image ? Storage::url($service->image) : '#' }}"
                                    alt="Preview" style="max-height: 100px;">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 fv-row mb-5">
                            <label class="fs-5 fw-bold mb-2">Description</label>
                            <div class="form-control ready-only-input-color" readonly data-kt-autosize="true">
                                {!! html_entity_decode($service->description) !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

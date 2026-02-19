@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="isset($service) ? 'Edit Service' : 'Add Service'" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('admin.dashboard')],
        ['label' => 'Services', 'url' => route('admin.services.index')],
        ['label' => isset($service) ? 'Edit Service' : 'Add Service', 'active' => true],
    ]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="card-label">{{ isset($service) ? 'Edit Service' : 'Add New Service' }}</h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>

            <div class="card-body py-4">
                <form method="POST" action="{{ isset($service) ? route('admin.services.update', $service->id) : route('admin.services.store') }}">
                    @csrf
                    @if(isset($service))
                    @method('PUT')
                    @endif

                    <div class="row mb-6">
                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Service Name</label>
                            <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Enter service name (e.g. Hair Cut)" value="{{ old('name', $service->name ?? '') }}" required />
                            @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-6 fw-bold mb-2">Price (TK)</label>
                            <input type="number" step="0.01" name="price" class="form-control form-control-solid @error('price') is-invalid @enderror" placeholder="Enter price" value="{{ old('price', $service->price ?? '') }}" required />
                            @error('price')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center pt-10">
                        <button type="submit" class="btn btn-primary w-200px">
                            <span class="indicator-label">{{ isset($service) ? 'Update Service' : 'Save Service' }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
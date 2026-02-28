@extends('admin.layouts.app')

@section('content')
<x-toolbar :title="'My Profile'"
    :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Profile', 'active' => true]]" />

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xxl-8">
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            @if($profile->profile && $profile->profile->picture)
                            <img src="{{ asset('storage/' . $profile->profile->picture) }}" alt="{{ $profile->name }}" />
                            @else
                            <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="{{ $profile->name }}" />
                            @endif
                            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $profile->name }}</span>
                                    <span class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3">Active</span>
                                </div>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                    <span class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <i class="bi bi-envelope fs-4 me-1 text-primary"></i>{{ $profile->email }}
                                    </span>
                                    @if($profile->profile && $profile->profile->phone)
                                    <span class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <i class="bi bi-phone fs-4 me-1 text-success"></i>{{ $profile->profile->phone }}
                                    </span>
                                    @endif
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                <!--begin::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                            href="{{ route('admin.profile') }}">Overview</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5"
                            href="{{ route('admin.passwordChange') }}">Password Change</a>
                    </li>
                    <!--end::Nav item-->
                </ul>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::Row-->
        <div class="row g-5 g-xxl-8">
            <!--begin::Col-->
            <div class="col-xl-12">
                <div class="card mb-5 mb-xxl-8">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Edit Profile</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Name</label>
                                    <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" value="{{ old('name', $profile->name) }}" required />
                                    @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Email</label>
                                    <input type="email" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror" value="{{ old('email', $profile->email) }}" required />
                                    @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Phone</label>
                                    <input type="text" name="phone" class="form-control form-control-solid @error('phone') is-invalid @enderror" value="{{ old('phone', $profile->profile->phone ?? '') }}" />
                                    @error('phone')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Profile Picture</label>
                                    <input type="file" name="picture" class="form-control form-control-solid @error('picture') is-invalid @enderror" />
                                    @error('picture')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 fv-row mb-5">
                                    <label class="fs-5 fw-bold mb-2">Address</label>
                                    <textarea name="address" class="form-control form-control-solid" rows="3">{{ old('address', $profile->profile->address ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
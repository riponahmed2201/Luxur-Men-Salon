@extends('admin.layouts.app')

@section('content')
    <x-toolbar :title="'Password Change'"
               :breadcrumbs="[['label' => 'Home', 'url' => route('admin.dashboard')], ['label' => 'Password Change', 'active' => true]]"/>

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
                                <img src="{{ Storage::url($profile->profile->picture) }}" alt="{{ $profile->name }}"/>
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <!--end::Pic-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                               href="/admin/profile">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                               href="/admin/password-change">Password Change</a>
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
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Password Change</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <form action="{{ route('admin.password.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <!-- Current Password -->
                                    <div class="col-md-12 fv-row mb-5">
                                        <label for="current_password" class="fs-5 fw-bold mb-2">Current Password</label>
                                        <input type="password" name="current_password" id="current_password"
                                               class="form-control form-control-solid @error('current_password') is-invalid @enderror"
                                               placeholder="Enter current password" required/>
                                        @error('current_password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="col-md-12 fv-row mb-5">
                                        <label for="password" class="fs-5 fw-bold mb-2">New Password</label>
                                        <input type="password" name="password" id="password"
                                               class="form-control form-control-solid @error('password') is-invalid @enderror"
                                               placeholder="Enter new password" required/>
                                        @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-md-12 fv-row mb-5">
                                        <label for="password_confirmation" class="fs-5 fw-bold mb-2">Confirm
                                            Password</label>
                                        <input type="password" name="password_confirmation"
                                               id="password_confirmation"
                                               class="form-control form-control-solid"
                                               placeholder="Enter confirm password" required/>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->

                            <!-- Submit Button -->
                            <div class="modal-footer flex-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection

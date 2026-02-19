<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../">

    <meta charset="utf-8" />
    <meta name="description"
        content="Luxur Men Salon - Premium grooming services for men. Advanced hair care, styling, and salon management system." />
    <meta name="keywords"
        content="Luxur Men Salon, Mens Salon, Hair Cut, Grooming, Salon Management System, Barbershop" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Open Graph Meta Tags for Social Sharing -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Luxur Men Salon – Premium Men's Grooming" />
    <meta property="og:description"
        content="Experience premium grooming at Luxur Men Salon. Professional hair care and styling for the modern man." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="Luxur Men Salon" />

    <title>Luxur Men Salon | Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/logo/logo.png') }}" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!-- izitoast CSS -->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="/admin/login" class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/logo/logo.png') }}" class="h-40px" />
                    <strong>Luxur Men Salon</strong>
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In to Luxur Men Salon</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-5">
                            <label class="required form-label fs-6 fw-bolder text-dark">Email</label>
                            <input
                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                type="email" placeholder="Enter your email" name="email" autocomplete="off"
                                value="{{ old('email') }}" />
                            @error('email')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 fw-bolder text-dark">Password</label>
                            <input
                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                type="password" placeholder="Enter your password" name="password" autocomplete="off"
                                value="{{ old('password') }}" />
                            @error('password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">About</a>
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/admin/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->

    <!-- izitoast JS -->
    <script src="{{ asset('js/iziToast.js') }}"></script>

    <!-- include izitoast vendor -->
    @include('vendor.lara-izitoast.toast')

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
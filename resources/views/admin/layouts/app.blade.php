<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head>
    <base href="../../">
    <title>Luxur Men Salon | Admin</title>

    <!--Meta-->
    @include('admin.layouts.partials.meta')

    <!--Styles-->
    @include('admin.layouts.partials.styles')
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            <!--begin::Aside-->
            @include('admin.layouts.partials.sidebar')
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Header-->
                @include('admin.layouts.partials.header')
                <!--end::Header-->

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    <!--begin::Post-->
                    @yield('content')
                    <!--end::Post-->

                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                @include('admin.layouts.partials.footer')
                <!--end::Footer-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Scrolltop-->
    @include('admin.layouts.partials.scrolltop')
    <!--end::Scrolltop-->

    <!-- Global JavaScript -->
    @include('admin.layouts.partials.scripts')

    <!-- include izitoast vendor -->
    @include('vendor.lara-izitoast.toast')

    @stack('scripts')

</body>
<!--end::Body-->

</html>
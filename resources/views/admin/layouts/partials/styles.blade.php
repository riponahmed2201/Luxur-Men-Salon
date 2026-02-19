<!-- Canonical URL -->
<link rel="canonical" href="https://ideaarchitectltd.com" />

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

<style>
    .ready-only-input-color {
        background-color: #d2d2d2 !important;
    }
</style>

<!-- Page Specific CSS -->
@stack('styles')

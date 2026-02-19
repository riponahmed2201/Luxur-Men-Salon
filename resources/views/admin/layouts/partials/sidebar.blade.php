<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="/admin/dashboard">
            <img alt="Logo" src="{{ asset('assets/logo/logo.png') }}" class="h-25px logo" />
            <strong class="text-black">Luxur Men Salon</strong>
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="black" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 text-primary"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">💇‍♂️ Salon Management</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-tools fs-3 text-info"></i>
                        </span>
                        <span class="menu-title">Services</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/employees*') ? 'active' : '' }}" href="{{ route('admin.employees.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-people fs-3 text-danger"></i>
                        </span>
                        <span class="menu-title">Employees</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">🧾 Billing & Accounts</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/billings*') ? 'active' : '' }}" href="{{ route('admin.billings.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-receipt fs-3 text-success"></i>
                        </span>
                        <span class="menu-title">Billing (Receipt)</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/reports*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-graph-up fs-3 text-warning"></i>
                        </span>
                        <span class="menu-title">Accounts & Reports</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/expenses*') ? 'active' : '' }}" href="{{ route('admin.expenses.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-wallet2 fs-3 text-primary"></i>
                        </span>
                        <span class="menu-title">Daily Expenses</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">⚙️ Settings</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">
                        <span class="menu-icon">
                            <i class="bi bi-person fs-3 text-primary"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/password-change') ? 'active' : '' }}" href="{{ route('admin.passwordChange') }}">
                        <span class="menu-icon">
                            <i class="bi bi-shield-lock fs-3 text-dark"></i>
                        </span>
                        <span class="menu-title">Password Change</span>
                    </a>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>
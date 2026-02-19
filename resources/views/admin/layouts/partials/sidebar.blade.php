<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="/admin/dashboard">
            <img alt="Logo" src="{{ asset('assets/logo/logo.png') }}" class="h-25px logo" />
            <strong class="text-black">Idea Architect Ltd</strong>
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
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">🧑‍💼 General</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 text-primary"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/profile') ? 'active' : '' }}"
                        href="/admin/profile">
                        <span class="menu-icon">
                            <i class="bi bi-person fs-3 text-info"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="/admin/users">
                        <span class="menu-icon">
                            <i class="bi bi-people fs-3 text-danger"></i>
                        </span>
                        <span class="menu-title">Team Members</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">💼 Business Content</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/partners*') ? 'active' : '' }}" href="/admin/partners">
                        <span class="menu-icon">
                            <i class="bi bi-people fs-3 text-success"></i>
                        </span>
                        <span class="menu-title">Partners</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/sliders*') ? 'active' : '' }}" href="/admin/sliders">
                        <span class="menu-icon">
                            <i class="bi bi-images fs-3 text-warning"></i>
                        </span>
                        <span class="menu-title">Sliders</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">🎨 Portfolio & Media</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/portfolios*') ? 'active' : '' }}"
                        href="/admin/portfolios">
                        <span class="menu-icon">
                            <i class="bi bi-briefcase fs-3 text-info"></i>
                        </span>
                        <span class="menu-title">Portfolios</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/projects*') ? 'active' : '' }}" href="/admin/projects">
                        <span class="menu-icon">
                            <i class="bi bi-kanban fs-3 text-success"></i>
                        </span>
                        <span class="menu-title">Projects</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/videos*') ? 'active' : '' }}" href="/admin/videos">
                        <span class="menu-icon">
                            <i class="bi bi-camera-video fs-3 text-danger"></i>
                        </span>
                        <span class="menu-title">Videos</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">🛠 Services</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/service-categories*') ? 'active' : '' }}"
                        href="/admin/service-categories">
                        <span class="menu-icon">
                            <i class="bi bi-layers fs-3 text-primary"></i>
                        </span>
                        <span class="menu-title">Service Categories</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/services*') ? 'active' : '' }}" href="/admin/services">
                        <span class="menu-icon">
                            <i class="bi bi-tools fs-3 text-info"></i>
                        </span>
                        <span class="menu-title">Services</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">🏷 Tags & Blogs</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/tags') ? 'active' : '' }}" href="/admin/tags">
                        <span class="menu-icon">
                            <i class="bi bi-tags fs-3 text-success"></i>
                        </span>
                        <span class="menu-title">Tags</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('admin/blogs') ? 'active' : '' }}" href="admin/blogs">
                        <span class="menu-icon">
                            <i class="bi bi-journal-text fs-3 text-danger"></i>
                        </span>
                        <span class="menu-title">Blogs</span>
                    </a>
                </div>

                {{-- <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Settings</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi-chat-left fs-3"></i>
                        </span>
                        <span class="menu-title">Blank</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo1/dist/apps/file-manager/folders.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Folders</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>

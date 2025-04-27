<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="{{ url('/') }}/">
    <title>Library FYP Project</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="#" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="#" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.svg" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->

    <!--<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">-->

    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Font Awesome -->
    <link href="assets/plugins/custom/fontawesome-pro-6.4.0-web/css/all.min.css" rel="stylesheet" type="text/css" />
    <!--end::Font Awesome -->

    <!--begin::Custom CSS -->
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!--end::Custom CSS -->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--Script for loading book list-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Script for loading book list-->
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="fa-duotone fa-bars fs-3 fs-md-1"></i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="index.html" class="d-lg-none">
                            <img alt="Logo" src="assets/media/logos/library.png" class="h-25px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::Theme mode-->
                            <div class="app-navbar-item ms-1 ms-md-3">
                                <!--begin::Menu toggle-->
                                <a href="#"
                                    class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="fa-duotone fa-sun fs-3 theme-light-show fs-lg-3"></i>
                                    <i class="fa-duotone fa-moon fs-3 theme-dark-show fs-lg-3"></i>
                                </a>
                                <!--begin::Menu toggle-->
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="light">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="fa-duotone fa-sun fs-3"></i>
                                            </span>
                                            <span class="menu-title">Light</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="dark">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="fa-duotone fa-moon fs-3"></i>
                                            </span>
                                            <span class="menu-title">Dark</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="system">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="fa-duotone fa-desktop fs-3"></i>
                                            </span>
                                            <span class="menu-title">System</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Theme mode-->
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <img src="assets/media/svg/avatars/001-boy.svg" alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="assets/media/svg/avatars/001-boy.svg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                @if (Auth::check())
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                        {{ Auth::user()->name }}
                                                    </div>
                                                    <a href="#"
                                                        class="fw-semibold text-muted text-hover-primary fs-7">
                                                        {{ Auth::user()->email }}</a>
                                                @endif
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        @if (Auth::check())
                                            <a href="{{ route('profile-student', ['id' => Auth::id()]) }}"
                                                class="menu-link px-5">My profile</a>
                                        @endif

                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a class="menu-link px-5" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="{{ route('dashboard') }}">
                            <img alt="Logo" src="assets/media/logos/library.png"
                                class="h-25px app-sidebar-logo-default" />
                            <img alt="Logo" src="assets/media/logos/library.png"
                                class="h-25px app-sidebar-logo-minimize" />
                        </a>
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <i class="fa-duotone fa-chevrons-left fs-4"></i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                            data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention px-3"
                                id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="{{ route('dashboard') }}">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-house fs-3"></i>
                                            </span>
                                            <span class="menu-title">Dashboard</span>
                                        </a>
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                            <a class="menu-link" href="{{ route('users') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-duotone fa-user fs-3"></i>
                                                </span>
                                                <span class="menu-title">Students</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'teacher')
                                            <a class="menu-link"
                                                href="{{ route('formclassstudents', ['teacher_id' => Auth::user()->id]) }}">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-person-chalkboard fs-3"></i>
                                                </span>
                                                <span class="menu-title">Teaching Class</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->

                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'admin')
                                            <a class="menu-link" href="{{ route(name: 'teacherusers') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-person-chalkboard fs-3"></i>
                                                </span>
                                                <span class="menu-title">Teachers</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'admin')
                                            <a class="menu-link" hidden href="{{ route('dashboard') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-user-gear fs-3"></i>
                                                </span>
                                                <span class="menu-title">Admins</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="{{ route('books') }}">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-book fs-3"></i>
                                            </span>
                                            <span class="menu-title">Books</span>
                                        </a>
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->


                                        @if (Auth::user()->role == 'student')
                                            <a class="menu-link" href="{{ route('assignedBook') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-user-gear fs-3"></i>
                                                </span>
                                                <span class="menu-title">Assigned Book</span>
                                            </a>
                                        @endif

                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                            <a class="menu-link" href="{{ route(name: 'notes') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-regular fa-note-sticky fs-3"></i>
                                                </span>
                                                <span class="menu-title">Student Report</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        {{-- @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'student' or Auth::user()->role == 'admin') --}}
                                            <a class="menu-link" href="{{ route('classnotesindex', ['user_id' => Auth::user()->id]) }}">
                                                <span class="menu-icon">
                                                    <i class="fa-regular fa-note-sticky fs-3"></i>
                                                </span>
                                                <span class="menu-title">Weekly Topic</span>
                                            </a>
                                        {{-- @endif --}}
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                            <a class="menu-link" href="{{ route(name: 'questions') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-regular fa-note-sticky fs-3"></i>
                                                </span>
                                                <span class="menu-title">Questions</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="{{ route('reviews') }}">
                                            <span class="menu-icon">
                                                <i class="fa-regular fa-star fs-3"></i>
                                            </span>
                                            <span class="menu-title">Reviews</span>
                                        </a>
                                        <!--end:Menu link-->
                                        <a class="menu-link" href="{{ route('formclassteacher') }}">
                                            <span class="menu-icon">
                                                <i class="fa-regular fa-star fs-3"></i>
                                            </span>
                                            <span class="menu-title">Form Classes</span>
                                        </a>
                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                            <a class="menu-link" href="{{ route('assignments') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-regular fa-star fs-3"></i>
                                                </span>
                                                <span class="menu-title">Assignments</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->

                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                            <a class="menu-link" href="{{ route('genres') }}">
                                                <span class="menu-icon">
                                                    <i class="fa-regular fa-icons fs-3"></i>
                                                </span>
                                                <span class="menu-title">Genre</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->
                                        <!--begin:Menu link-->
                                        @if (Auth::user()->role == 'student')
                                            <a class="menu-link"
                                                href="{{ route('studentassignment', ['id' => Auth::user()->id]) }}">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </span>
                                                <span class="menu-title">Student Assignment</span>
                                            </a>
                                        @endif
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->

                                </div>
                                <!--end:Menu item-->

                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->


                    @yield('content')




                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer">
                        <!--begin::Footer container-->
                        <div
                            class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2025&copy;</span>
                                <a href="#" target="_blank"
                                    class="text-gray-800 text-hover-primary">Library</a>
                            </div>
                            <!--end::Copyright-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="fa-regular fa-chevron-up text-white"></i>
    </div>
    <!--end::Scrolltop-->


    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/js/custom.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
@yield('scripts')
<script>
    @yield('footerjs')

    let table = $("#kt_datatable_both_scrolls").DataTable({
        "scrollX": true,
        "sortable": true,
        "ordering": true,
        "searching": true, // Enable search
        "order": [
            [0, "asc"]
        ],

        // Custom search box functionality

    });

    $('.form-control').on('keyup', function() {
        table.search($(this).val()).draw();
    });
</script>

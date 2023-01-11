@php
    $company = App\Company::first();
@endphp
<!doctype html>
<html lang="en" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ $company->name }}</title>

    <meta name="description" content="{{ $company->name }} created by SPACESHIPTECH">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ $company->name }}">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="{{ $company->name }} created by SPACESHIPTECH">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset($company->favicon) }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset($company->favicon) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($company->favicon) }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/js/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/plugins/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('admin/assets/css/codebase.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css"
        integrity="sha512-CmjeEOiBCtxpzzfuT2remy8NP++fmHRxR3LnsdQhVXzA3QqRMaJ3heF9zOB+c1lCWSwZkzSOWfTn1CdqgkW3EQ=="
        crossorigin="anonymous" />
    <style>
        .table img {
            height: 100px;
            width: auto;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 34px !important;
        }

        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 4px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3f9ce8 !important;
            border: 1px solid #3f9ce8 !important;
            color: white !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff !important;

        }
    </style>
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('admin/assets/css/themes/flat.min.css') }}"> -->
    <!-- END Stylesheets -->

</head>

<body>

    <!-- Page Container -->
    <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
    <div id="page-container"
        class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-modern main-content-boxed">


        <!-- Sidebar -->
        <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
        <nav id="sidebar">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow px-15">
                    <!-- Mini Mode -->
                    <div class="content-header-section sidebar-mini-visible-b">
                        <!-- Logo -->
                        <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                            <span class="text-dual-primary-dark">A</span><span class="text-primary">P</span>
                        </span>
                        <!-- END Logo -->
                    </div>
                    <!-- END Mini Mode -->

                    <!-- Normal Mode -->
                    <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="{{ route('index') }}">
                                <i class="si si-fire text-primary"></i>
                                <span class="font-size-xl text-dual-primary-dark">Admin</span><span
                                    class="font-size-xl text-primary">Panel</span>
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                    <!-- END Normal Mode -->
                </div>
                <!-- END Side Header -->

                <!-- Side User -->
                <div class="content-side content-side-full content-side-user px-10 align-parent">
                    <!-- Visible only in mini mode -->
                    <div class="sidebar-mini-visible-b align-v animated fadeIn">
                        <img class="img-avatar img-avatar32" src="{{ asset($company->favicon) }}" alt="">
                    </div>
                    <!-- END Visible only in mini mode -->

                    <!-- Visible only in normal mode -->
                    <div class="sidebar-mini-hidden-b text-center">
                        <a class="img-link" href="{{ route('adminedit', Auth::guard('admin')->user()->id) }}">
                            <img class="" style="height:60px" src="{{ asset($company->favicon) }}"
                                alt="">
                        </a>
                        <ul class="list-inline mt-10">
                            <li class="list-inline-item">
                                <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase"
                                    href="{{ route('adminedit', Auth::guard('admin')->user()->id) }}">{{ Auth::guard('admin')->user()->username }}</a>
                            </li>

                            <li class="list-inline-item">
                                <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}">
                                    <i class="si si-logout"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Visible only in normal mode -->
                </div>
                <!-- END Side User -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li>
                            <a class="active" href="{{ route('dashboard') }}"><i class="si si-cup"></i><span
                                    class="sidebar-mini-hide">Dashboard</span></a>
                        </li>

                        <li>
                            <a class="active" href="{{ route('reportabuseview') }}"><i class="fa fa-times"></i><span
                                    class="sidebar-mini-hide">Report Abuse</span></a>
                        </li>
                        {{--  --}}

                        <li class="nav-main-heading"><span class="sidebar-mini-visible">Users</span><span
                                class="sidebar-mini-hidden">Users</span></li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                    class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('customerview', 1) }}">Offer</a>
                                </li>

                                <li>
                                    <a href="{{ route('customerview', 0) }}">Supplier</a>
                                </li>
                            </ul>
                        </li>

                        {{--  --}}

                        <li class="nav-main-heading"><span class="sidebar-mini-visible">Website</span><span
                                class="sidebar-mini-hidden">Website Content</span></li>

                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                    class="fa fa-star"></i><span class="sidebar-mini-hide">Customer Reviews</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('testimonialview') }}">View</a>
                                </li>
                                <li>
                                    <a href="{{ route('testimonialadd') }}">Add</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                    class="fa fa-question"></i><span class="sidebar-mini-hide">FAQ's</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('faqview') }}">View</a>
                                </li>
                                <li>
                                    <a href="{{ route('faqadd') }}">Add</a>
                                </li>

                            </ul>
                        </li>
                        {{-- <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                    class="fa fa-image"></i><span class="sidebar-mini-hide">Main Slider</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('sliderview') }}">View</a>
                                </li>
                                <li>
                                    <a href="{{ route('slideradd') }}">Add</a>
                                </li>

                            </ul>
                        </li> --}}



                        {{--  --}}
                        @if (Auth::guard('admin')->user()->role == 'admin')
                            <li class="nav-main-heading"><span class="sidebar-mini-visible">Website</span><span
                                    class="sidebar-mini-hidden">Website Settings</span></li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                        class="si si-lock"></i><span class="sidebar-mini-hide">Admins</span></a>
                                <ul>
                                    <li>
                                        <a href="{{ route('adminview') }}">View</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('adminadd') }}">Add</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="" href="{{ route('why_us') }}"><i class="fa fa-gear"></i><span
                                        class="sidebar-mini-hide">Why Choose Us</span></a>
                            </li>
                            <li>
                                <a class="" href="{{route('bannerview')}}"><i class="fa fa-gear"></i><span class="sidebar-mini-hide">Top Banner</span></a>
                            </li>
                            <li>
                                <a class="" href="{{ route('aboutview') }}"><i class="fa fa-gear"></i><span
                                        class="sidebar-mini-hide">About</span></a>
                            </li>
                            <li>
                                <a class="" href="{{ route('companyview') }}"><i class="fa fa-gear"></i><span
                                        class="sidebar-mini-hide">Settings</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- Sidebar Content -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="content-header-section">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-navicon"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->


                    <!-- Layout Options (used just for demonstration) -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-circle btn-dual-secondary"
                            id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
                            <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>

                            <h6 class="dropdown-header">Header</h6>
                            <div class="row gutters-tiny text-center mb-5">
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary"
                                        data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                                </div>
                                <div class="col-6">
                                    <button type="button"
                                        class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10"
                                        data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                                </div>
                            </div>
                            <h6 class="dropdown-header">Sidebar</h6>
                            <div class="row gutters-tiny text-center mb-5">
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10"
                                        data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10"
                                        data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                                </div>
                            </div>
                            <div class="d-none d-xl-block">
                                <h6 class="dropdown-header">Main Content</h6>
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10"
                                    data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                            </div>


                        </div>
                    </div>
                    <!-- END Layout Options -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="content-header-section">
                    <!-- User Dropdown -->
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary"
                            id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ Auth::guard('admin')->user()->username }}</span>
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-200"
                            aria-labelledby="page-header-user-dropdown">
                            <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
                            <a class="dropdown-item"
                                href="{{ route('adminedit', Auth::guard('admin')->user()->id) }}">
                                <i class="si si-user mr-5"></i> Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="si si-logout mr-5"></i> Sign Out
                            </a>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications -->
                    <div class="btn-group" role="group">

                        <div class="dropdown-menu dropdown-menu-right min-width-300"
                            aria-labelledby="page-header-notifications">
                            <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>
                            <ul class="list-unstyled my-20">
                                <li>
                                    <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                        <div class="ml-5 mr-15">
                                            <i class="fa fa-fw fa-check text-success"></i>
                                        </div>
                                        <div class="media-body pr-10">
                                            <p class="mb-0">You’ve upgraded to a VIP account successfully!</p>
                                            <div class="text-muted font-size-sm font-italic">15 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                        <div class="ml-5 mr-15">
                                            <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                        </div>
                                        <div class="media-body pr-10">
                                            <p class="mb-0">Please check your payment info since we can’t validate
                                                them!</p>
                                            <div class="text-muted font-size-sm font-italic">50 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                        <div class="ml-5 mr-15">
                                            <i class="fa fa-fw fa-times text-danger"></i>
                                        </div>
                                        <div class="media-body pr-10">
                                            <p class="mb-0">Web server stopped responding and it was automatically
                                                restarted!</p>
                                            <div class="text-muted font-size-sm font-italic">4 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                        <div class="ml-5 mr-15">
                                            <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                        </div>
                                        <div class="media-body pr-10">
                                            <p class="mb-0">Please consider upgrading your plan. You are running out
                                                of space.</p>
                                            <div class="text-muted font-size-sm font-italic">16 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                        <div class="ml-5 mr-15">
                                            <i class="fa fa-fw fa-plus text-primary"></i>
                                        </div>
                                        <div class="media-body pr-10">
                                            <p class="mb-0">New purchases! +$250</p>
                                            <div class="text-muted font-size-sm font-italic">1 day ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                                <i class="fa fa-flag mr-5"></i> View All
                            </a>
                        </div>
                    </div>
                    <!-- END Notifications -->

                    <!-- Toggle Side Overlay -->

                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <form action="be_pages_generic_search.html" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <!-- Close Search Section -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-secondary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fa fa-times"></i>
                                </button>
                                <!-- END Close Search Section -->
                            </div>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        @yield('content')



        <!-- Footer -->
        <footer id="page-footer" class="opacity-0">
            <div class="content py-20 font-size-sm clearfix">
                <div class="float-right">
                    Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href=""
                        target="_blank">SPACESHIPTECH</a>
                </div>
                <div class="float-left">
                    <a class="font-w600" href="" target="_blank">{{ $company->name }}</a> &copy; <span
                        class="js-year-copy"></span>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->




    <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->

    <div class="modal fade" id="modal-slideup" tabindex="-1" role="dialog" aria-labelledby="modal-slideup"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-slideup" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Delete <span id="deletetitle"></span></h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Are you Sure you want to delete?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#0" class="btn btn-alt-danger" id="deletebtn">
                        <i class="fa fa-check"></i> Delete
                    </a>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/codebase.core.min.js') }}"></script>

    <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="{{ asset('admin/assets/js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin/assets/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/slick/slick.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin/assets/js/pages/be_pages_dashboard.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script src="{{ asset('admin/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin/assets/js/pages/be_tables_datatables.min.js') }}"></script>



    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin/assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin/assets/js/pages/be_forms_wizard.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"
        integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg=="
        crossorigin="anonymous"></script>
    <script>
        $(".delete").click(function() {
            $("#deletetitle").text($(this).attr("data-title"));
            $("#deletebtn").attr("href", $(this).attr("data-href"));
        });
    </script>

    @yield('js')
    <script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        $("#select2").select2();
    </script>
</body>

</html>

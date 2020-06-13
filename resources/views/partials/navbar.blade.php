@extends('layouts.codebase')
@section('content')

    <div id="page-container" class="bg-white sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">

        <!-- Sidebar -->
        <nav id="sidebar" style="background: #232e40" class="navbar-fixed-top">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow ">
                    <div class="content-header-section text-center align-parent">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="/">
                                <h2 class="text-warning">Kuisioner.com</h2>
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Main Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li>
                            <a href="/">Responden</a>
                        </li>
                        <li>
                            <a href="/">Surveyor</a>
                        </li>
                        <li>
                            <a href="/">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="/">Kontak</a>
                        </li>


                        @if(auth()->check())
                            <li>
                                <a  class="nav-submenu text-white " data-toggle="nav-submenu" href="#" >{{ auth()->user()->name }}</a>
                                <ul>
                                    <li>
                                        <a class="text-white" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @else

                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>

                        @endif

                    </ul>
                </div>
                <!-- END Side Main Navigation -->
            </div>
            <!-- Sidebar Content -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header" class="bg-corporate-dark-op shadow-sm navbar-fixed-top">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="content-header-section">
                    <!-- Logo -->
                    <a href="/">
                        <img src="{{ asset('images/logo/kuisioner.png') }}" width="50%" alt="" class="titipmasa-logo">
                    </a>
                    <!-- END Logo -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="content-header-section">
                    <ul class="nav-main-header">
                        <li>
                            <a href="/" class="nav-link">Responden</a>
                        </li>
                        <li>
                            <a href="/" class="nav-link">Surveyor</a>
                        </li>
                        <li>
                            <a href="/" class="nav-link">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="/" class="nav-link">Kontak</a>
                        </li>

                    @if(auth()->check())

                            <li>
                                <a  class="nav-submenu text-white menu_titipmasa" data-toggle="nav-submenu" href="#" >{{ auth()->user()->name }}</a>
                                <ul class="submenu">
                                    <li>
                                        <a class="text-white" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else

                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    </ul>

                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none bg-warning" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-navicon"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <form action="#" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <!-- Close Search Section -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-times"></i>
                                </button>
                                <!-- END Close Search Section -->
                            </div>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary px-15">
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

        <!-- Main Container -->

        <main id="main-container">
            <div class="container">
                @yield('main-content')
            </div>

        </main>

    </div>

@endsection

@push('js')
    <script>
        // $(function () {
        //     $(document).scroll(function () {
        //         var $nav = $(".navbar-fixed-top");
        //         $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        //     });
        // });
    </script>
@endpush


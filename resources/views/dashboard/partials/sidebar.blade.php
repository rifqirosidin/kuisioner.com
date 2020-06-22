<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout"
                        data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="#">
                        <span class="font-size-xl text-dual-primary-dark">Kuisioner</span><span
                            class="font-size-xl color-text">.com</span>
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
                <img class="img-avatar img-avatar32" src="{{ asset('vendor\assets\media\avatars\avatar16.jpg') }}"
                     alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="#">
                    <img class="img-avatar" src="{{ asset('vendor\assets\media\avatars\avatar16.jpg') }}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase"
                           href="{{ route('users.edit', auth()->id()) }}">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout"
                           data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                           class="link-effect text-dual-primary-dark">
                            <i class="si si-logout"></i>
                        </a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" id="form-logout" method="post">
                    @csrf
                </form>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="active" href="{{ route('dashboard') }}"><i class="si si-home"></i><span
                            class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('tasks.index') }}"><i class="fa fa-tasks"></i><span class="sidebar-mini-hide">Daftar Tugas</span></a>
                </li>
                <li>
                    <a href="{{ route('tasks.create') }}"><i class="si si-note"></i><span class="sidebar-mini-hide">Buat Tugas</span></a>
                </li>
                <li>
                    <a href="{{ route('top-up.create') }}"><i class="fa fa-arrow-circle-o-up"></i><span class="sidebar-mini-hide">Top Up</span></a>
                </li>
                <li>
                    <a href="{{ route('transactions.index') }}"><i class="si si-notebook"></i><span class="sidebar-mini-hide">Transaksi</span></a>
                </li>
                @if(auth()->id() == 2)
                    <li>
                        <a href="{{ route('payments.index') }}"><i class="fa fa-money"></i><span class="sidebar-mini-hide">Verifikasi Pembayaran</span></a>
                    </li>
                    <li>
                        <a href="{{ route('top-up.index') }}"><i class="fa fa-money"></i><span class="sidebar-mini-hide">Verifikasi Saldo</span></a>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-settings"></i><span
                                class="sidebar-mini-hide">Pengaturan</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('price-balances.index') }}">Harga saldo</a>
                            </li>
                            <li>
                                <a href="{{ route('banners.index') }}">Banner</a>
                            </li>
                            <li>
                                <a href="{{ route('testimonies.index') }}">Testimoni</a>
                            </li>
                            <li>
                                <a href="{{ route('payment-methods.index') }}">Metode Pembayaran</a>
                            </li>
                            <li>
                                <a href="{{ route('about-us.index') }}">Tentang kami</a>
                            </li>

                        </ul>

                    </li>
                @endif
            </ul>

        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>

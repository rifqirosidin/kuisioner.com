@extends('layouts.codebase')
@section('content')

    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-body-dark bg-pattern">

                <div class="row mx-0 justify-content-center">
                    <div class="hero-static col-lg-6 col-xl-4">
                        <div class="content content-full overflow-hidden">
                            <!-- Header -->
                            <div class="py-30 text-center">
                                <a class="link-effect font-w700" href="/">
                                    <span class="font-size-xl text-primary-dark">Kuisioner</span><span class="font-size-xl">.com</span>
                                </a>
                                <h1 class="h4 font-w700 mt-30 mb-10">Welcome to Dashboard </h1>

                            </div>

                            <form class="js-validation-signin" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-primary">
                                        <h3 class="block-title">Please Sign In</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option">
                                                <i class="si si-wrench"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-6 d-sm-flex align-items-center push">
                                                <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                                    <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                                    <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-sm-right push">
                                                <button type="submit" class="btn btn-md bg-primary text-white">
                                                    <i class="si si-login mr-10"></i> Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content bg-body-light">
                                        <div class="form-group text-center">
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('register') }}">
                                                <i class="fa fa-plus mr-5"></i> Create Account
                                            </a>
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                                <i class="fa fa-warning mr-5"></i> Forgot Password
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
@endsection

    @push('js')
        <script src="{{ asset('vendor/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src=" {{ asset('vendor/assets/js/pages/be_ui_icons.min.js') }}"></script>
        <!-- Page JS Code -->
        <script src="{{ asset('vendor\assets\_es6\pages\op_auth_signin.js') }}"></script>
    @endpush

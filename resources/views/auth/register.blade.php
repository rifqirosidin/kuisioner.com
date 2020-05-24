@extends('layouts.codebase')
@section('content')

    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-body-dark bg-pattern" >
                <div class="row mx-0 justify-content-center">
                    <div class="hero-static col-lg-6 col-xl-4">
                        <div class="content content-full overflow-hidden">
                            <!-- Header -->
                            <div class="py-30 text-center">
                                <a class="link-effect font-w700" href="/">
                                    <span class="font-size-xl text-primary-dark">Kuisioner</span><span class="font-size-xl">.com</span>
                                </a>
                                <h1 class="h4 font-w700 mt-30 mb-10">Create New Account</h1>
                            </div>

                            <form class="js-validation-signup" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-primary">
                                        <h3 class="block-title">Please add your details</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option">
                                                <i class="si si-wrench"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password_confirmation">Password Confirmation</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-6 text-sm-right push">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-plus mr-10"></i> Create Account
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content bg-body-light">
                                        <div class="form-group text-center">
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('login') }}">
                                                <i class="fa fa-user text-muted mr-5"></i> Sign In
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
    </div>

@endsection

@push('js')
    <script src="{{ asset('vendor/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src=" {{ asset('vendor/assets/js/pages/be_ui_icons.min.js') }}"></script>
    <script src="{{ asset('vendor\assets\_es6\pages\op_auth_signup.js') }}"></script>
@endpush

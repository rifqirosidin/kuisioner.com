@extends('layouts.codebase')
@section('content')

    <div id="page-container" class="main-content-boxed">

        <main id="main-container">

            <div class="bg-body-dark bg-pattern">
                <div class="row mx-0 justify-content-center">
                    <div class="hero-static col-lg-6 col-xl-4">
                        <div class="content content-full overflow-hidden">
                            <!-- Header -->
                            <div class="py-30 text-center">
                                <a class="link-effect font-w700" href="/">
                                    <span class="font-size-xl text-primary-dark">Online</span><span class="font-size-xl">Tester</span>
                                </a>
                                <h2 class="h5 font-w400 text-muted mb-0">Please enter your email</h2>
                            </div>

                            <form class="js-validation-reminder" action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-gd-primary">
                                        <h3 class="block-title">Password Reminder</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option">
                                                <i class="si si-wrench"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="reminder-credential">Email</label>
                                                <input type="text" class="form-control" id="reminder-credential" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-alt-primary">
                                                <i class="fa fa-asterisk mr-10"></i> Password Reminder
                                            </button>
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
                            <!-- END Reminder Form -->
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
<!-- Page JS Code -->
<script src="{{ asset('vendor/assets/js/pages/op_auth_reminder.min.js') }}"></script>
@endpush

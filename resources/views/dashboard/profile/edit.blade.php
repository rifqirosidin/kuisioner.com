@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">


        <div class="row">
            <div class="col-md-6">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Edit Profil</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
                                        <label for="name">Name</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="password" class="form-control" name="password"  id="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                        <label for="password_confirmation">Password Confirmation</label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <button class="btn btn-sm btn-primary float-right" type="submit">Update Profile</button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

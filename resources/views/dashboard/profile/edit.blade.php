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
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" id="phone">
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Jenis kelamin</label>
                                <div class="col-12">
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="gender" id="gender" value="laki-laki" {{ $user->gender == 'laki-laki' ? 'checked':'' }}>
                                        <label class="custom-control-label" for="gender">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="gender" id="gender" value="perempuan" {{ $user->gender == 'perempuan' ? 'checked':'' }}>
                                        <label class="custom-control-label" for="gender">Perempuan</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="date" class="form-control" name="birthday" value="{{ $user->birthday }}" id="birthday">
                                        <label for="phone">Tanggal Lahir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" id="address">
                                        <label for="address">Address</label>
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
            <div class="col-md-6">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="block block-bordered">
                        <div class="block-header">
                            <h3 class="block-title">Update Password</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="password" class="form-control" name="password"  id="password" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                        <label for="password_confirmation">Password Confirmation</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material floating">
                                        <button class="btn btn-sm btn-primary float-right" type="submit">Update Password</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>
                <div>
                    <form action="{{ route('change.photo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="block block-bordered">
                            <div class="block-header">
                                <h3 class="block-title">Ubah Foto Profil</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-material floating">
                                            <input type="file" class="form-control" name="avatar"  id="avatar" required>

                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-material floating">
                                            <button class="btn btn-sm btn-primary float-right" type="submit">Update Photo</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
          >
        </div>

    </div>

@endsection

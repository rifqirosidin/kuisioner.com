@extends('dashboard.layouts.app')
@section('content-dashboard')
    <div class="content">
        <div class="row">
            <div class="col-md-10">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Edit Tugas</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('tasks.update', $task->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title">Judul</label>
                                        <input class="form-control" type="text" value="{{ $task->title }}" id="title"
                                               name="title">

                                    </div>
                                    <div class="form-group">
                                        <label for="number_of_respondents">Jumlah Responden</label>
                                        <input class="form-control" type="number"
                                               value="{{ $task->number_of_respondents }}" id="number_of_respondents"
                                               name="number_of_respondents">

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="mb-2 mt-10">Jenis Kelamin</label>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" id="gender" value="laki-laki" name="gender"
                                                   class="custom-control-input"
                                                {{ $task->gender == 'laki - laki' ? 'checked':'' }} >
                                            <label class="custom-control-label" for="gender">Laki - Laki</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="gender1" value="perempuan" name="gender"
                                                   class="custom-control-input"
                                                {{ $task->gender == 'perempuan' ? 'checked':'' }}>
                                            <label class="custom-control-label" for="gender1">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Kota</label>
                                        <input class="form-control" value="{{ $task->city }}" type="text" id="city"
                                               name="city">
                                        <span class="font-size-xs mt-2">Optional</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" id="description" cols="30" class="form-control"
                                                  rows="5">{{ $task->description }}</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="respondent_fee">Insentif Responden</label>
                                        <input class="form-control" type="number" value="{{ $task->respondent_fee }}"
                                               id="respondent_fee" name="respondent_fee">

                                        <span class="text-danger">note: per orang</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_cost">Total Biaya</label>
                                        <input class="form-control" value="{{ $task->total_cost }}"
                                               type="text" id="total_cost" name="total_cost" readonly="true">

                                        <span class="text-danger">Total biaya: jumlah responden * insentif responden + 5%</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group">
                                                <button type="submit"
                                                        class="btn btn-md btn-outline-primary float-right mb-5">Update
                                                </button>
                                            </div>
                                        </div>
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


@extends('dashboard.layouts.app')
@section('content-dashboard')
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h4>Daftar Tugas</h4>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" width="8%"><i class="si si-user"></i></th>
                            <th width="8%">Saldo</th>
                            <th width="15%">Name</th>
                            <th style="width: 30%;">Judul</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar12.jpg" alt="">
                                </td>
                                <td>2000</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ ucwords($task->title)  }}</td>
                                <td class="text-center"><a href="{{ route('tasks.show', $task->id) }}">Kerjakan</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td class="font-weight-bold text-center" colspan="5"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

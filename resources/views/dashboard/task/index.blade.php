@extends('dashboard.layouts.app')
@section('content-dashboard')
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h4>Daftar Tugas Saya</h4>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" width="8%">No</th>

                            <th>Judul</th>
                            <th width="15%">Tgl pembuatan</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td><a href="{{ route('tasks.show', $task->id) }}">{{ ucwords($task->title)  }}</a></td>
                                <td>{{ $task->created_at_format }}</td>
                                <td class="text-center"><a href="{{ route('show.form', $task->id) }}" target="_blank">Lihat Survey</a></td>
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

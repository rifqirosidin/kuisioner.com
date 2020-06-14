@extends('dashboard.layouts.app')
@section('content-dashboard')
   <div class="content">
       <div class="row">
           <div class="col-md-12">
               <div class="block">
                   <div class="block-header block-header-default">
                       <h3 class="block-title">Daftar Tugas Saya</h3>
                   </div>
                   <div class="block-content block-content-full">
                       <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                       <div class="col-12">
                           <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                               <thead>
                               <tr>
                                   <th class="text-center"></th>
                                   <th>Judul</th>
                                   <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>
                                   <th class="d-none d-sm-table-cell" style="width: 10%;">Tanggal Pembuatan</th>
                                   <th class="text-center" style="width: 15%;">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @forelse($tasks as $task)
                                   <tr>
                                       <td class="text-center">{{ $loop->iteration }}</td>
                                       <td><a href="{{ route('tasks.show', $task->id) }}">{{ ucwords($task->title)  }}</a></td>
                                       <td>
                                <span class="badge {{ $task->is_active == 1 ? 'badge-success' :'badge-danger'}}">
                                    {{ $task->is_active == 1 ? 'Active' :'Nonactive'}}
                                </span>
                                       </td>
                                       <td>{{ $task->created_at_format }}</td>
                                       @if(!isset($task->form))
                                           <td class="text-center"><a href="{{ route('surveys.create', $task->id) }}" target="_blank">Buat Form</a></td>
                                       @else
                                           <td class="text-center"><a href="{{ route('show.form', $task->id) }}" target="_blank">Lihat Survey</a></td>
                                       @endif
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


       </div>
   </div>

@endsection

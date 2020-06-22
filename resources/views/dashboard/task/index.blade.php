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
                                   <th class="d-none d-sm-table-cell" style="width: 10%;">Survey</th>
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
                                       <td class="text-center">
                                           <div class="btn-group">
                                               <a href="{{ route('tasks.edit', $task->id) }}"
                                                  class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                  data-toggle="tooltip" title="" data-original-title="Edit">
                                                   <i class="fa fa-pencil"></i>
                                               </a>
                                               <button type="button" onclick="removeTask('{{ $task->id }}')"
                                                       class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                       data-toggle="tooltip" title="" data-original-title="Delete">
                                                   <i class="fa fa-trash"></i>
                                               </button>
                                           </div>
                                       </td>
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
@push('js')
    <script>
        function removeTask(id) {
            let theUrl = "{{ route('tasks.destroy', ":taskId") }}";
            theUrl = theUrl.replace(":taskId", id);

                toast({
                    title: 'Apakah anda yakin?',
                    text: 'Menerima bukti pembayaran ini!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d26a5c',
                    confirmButtonText: 'Terima!',
                    html: false,
                    preConfirm: e => {
                        return new Promise(resolve => {
                            setTimeout(() => {
                                resolve();
                            }, 50);
                        });
                    }
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: theUrl,
                            success: function (data) {
                                window.location.href = data

                            },
                            error: function (data) {
                                console.log(data)
                            }
                        })
                        // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                    } else if (result.dismiss === 'cancel') {
                        toast('Cancelled', 'Your imaginary file is safe :)', 'error');
                    }
                });

        }
    </script>
@endpush

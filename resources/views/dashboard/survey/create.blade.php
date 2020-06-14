@extends('dashboard.layouts.app')
@section('content-dashboard')

   <div class="content">
       <h2 class="content-heading">Buat Survey</h2>
       <div class="row">
           <div class="col-md-8">
               <!-- Validation Wizard Material -->
               <div class="js-wizard-validation-material block">
                   <!-- Step Tabs -->
                   <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">

                       <li class="nav-item">
                           <a class="nav-link" href="#wizard-validation-material-step2" data-toggle="tab">Buat Survey</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#wizard-validation-material-step3" data-toggle="tab">Penutup</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#wizard-validation-material-step4" data-toggle="tab">Pembayaran</a>
                       </li>
                   </ul>
                   <!-- END Step Tabs -->

                   <!-- Form -->
                   <form class="js-wizard-validation-material-form" action="{{ route('surveys.store', $task->id) }}" method="post" enctype="multipart/form-data" id="form-survey">
                    @csrf
                   <!-- Steps Content -->
                       <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                           <!-- Step 1 -->

                           <!-- END Step 1 -->

                           <!-- Step 2 -->
                           <div class="tab-pane" id="wizard-validation-material-step2" role="tabpanel">

                                    @include('dashboard.survey.custom_form')


                           </div>
                           <!-- END Step 2 -->

                           <!-- Step 3 -->
                           <div class="tab-pane" id="wizard-validation-material-step3" role="tabpanel">
                                @include('dashboard.survey.step3')
                           </div>

                           <!-- END Step 3 -->

                           <!-- Step 4  -->

                           <div class="tab-pane" id="wizard-validation-material-step4" role="tabpanel">
                               @include('dashboard.survey.pembayaran')
                           </div>
                           <!-- END Step 4  -->


                       </div>
                       <!-- END Steps Content -->

                       <!-- Steps Navigation -->
                       <div class="block-content block-content-sm block-content-full bg-body-light">
                           <div class="row">
                               <div class="col-6">
                                   <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                                       <i class="fa fa-angle-left mr-5"></i> Previous
                                   </button>
                               </div>
                               <div class="col-6 text-right">
                                   <button type="button" id="next" class="btn btn-alt-secondary" data-wizard="next">
                                       Next <i class="fa fa-angle-right ml-5"></i>
                                   </button>
                                   <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                       <i class="fa fa-check mr-5"></i> Submit
                                   </button>
                               </div>
                           </div>
                       </div>
                       <!-- END Steps Navigation -->
                   </form>
                   <!-- END Form -->
               </div>
               <!-- END Validation Wizard 2 -->
           </div>


       </div>
   </div>

@endsection

@push('js')
    <script src="{{ asset('vendor/assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('vendor/assets/js/pages/be_forms_wizard.min.js') }}"></script>

    <script>

        // window.onbeforeunload = function(e) {
        //     return 'Dialog text here.';
        // };

    </script>
@endpush

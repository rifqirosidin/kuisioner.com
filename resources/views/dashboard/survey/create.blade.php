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
                           <a class="nav-link active" href="#wizard-validation-material-step1" data-toggle="tab">Buat Task</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#wizard-validation-material-step2" data-toggle="tab">Buat Survey</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#wizard-validation-material-step3" data-toggle="tab">Pembayaran</a>
                       </li>
                   </ul>
                   <!-- END Step Tabs -->

                   <!-- Form -->
                   <form class="js-wizard-validation-material-form" action="be_forms_wizard.html" method="post">
                   @csrf
                   <!-- Steps Content -->
                       <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                           <!-- Step 1 -->
                           <div class="tab-pane active" id="wizard-validation-material-step1" role="tabpanel">
                               <div class="form-group">
                                   <div class="form-material floating">
                                       <input class="form-control" type="text" id="wizard-validation-material-title" name="wizard-validation-material-jumlah">
                                       <label for="wizard-validation-material-title">Judul</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="form-material floating">
                                       <input class="form-control" type="text" id="wizard-validation-material-jumlah" name="wizard-validation-material-jumlah">
                                       <label for="wizard-validation-material-jumlah">Jumlah Responden</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                       <label for="" class="mb-2 mt-10">Jenis Kelamin</label>
                                       <div class="custom-control custom-radio mb-2">
                                           <input type="radio" id="gender" name="gender" class="custom-control-input">
                                           <label class="custom-control-label" for="gender">Laki - Laki</label>
                                       </div>
                                       <div class="custom-control custom-radio">
                                           <input type="radio" id="gender1" name="gender" class="custom-control-input">
                                           <label class="custom-control-label" for="gender1">Perempuan</label>
                                       </div>
                                </div>
                               <div class="form-group">
                                   <div class="form-material floating">
                                       <input class="form-control" type="text" id="city" name="city">
                                       <label for="city">Kota</label>
                                   </div>
                               </div>

                               <div class="form-group">
                                   <div class="form-material floating">
                                       <textarea name="description" id="description" cols="30" class="form-control" rows="5"></textarea>
                                       <label for="description">Deskripsi</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="form-material floating">
                                       <input class="form-control" type="text" id="responden_fee" name="responden_fee">
                                       <label for="responden_fee">Insentif Responden</label>
                                   </div>
                                   <span class="text-danger">note: per orang</span>
                               </div>
                               <div class="form-group">
                                   <div class="form-material floating">
                                       <input class="form-control" type="text" id="total_cost" name="total_cost"disabled>
                                       <label for="total_cost">Total Biaya</label>
                                   </div>
                                   <span class="text-danger">Total biaya: jumlah responden * insentif responden + 5%</span>
                               </div>

                           </div>
                           <!-- END Step 1 -->

                           <!-- Step 2 -->
                           <div class="tab-pane" id="wizard-validation-material-step2" role="tabpanel">

                               @include('dashboard.survey.template_form')
{{--                               <div class="form-group">--}}
{{--                                   <div class="form-material floating">--}}
{{--                                       <input type="text" class="form-control" name="embed_code">--}}
{{--                                       <label for="embed">Embed Code Google Form</label>--}}
{{--                                   </div>--}}

{{--                               </div>--}}
{{--                               <div class="form-group">--}}
{{--                                   <div class="form-material floating">--}}
{{--                                       <input type="text" class="form-control" name="link_google_form">--}}
{{--                                       <label for="link">Link Google Form</label>--}}
{{--                                   </div>--}}

{{--                               </div>--}}

                           </div>
                           <!-- END Step 2 -->

                           <!-- Step 3 -->
                           <div class="tab-pane" id="wizard-validation-material-step3" role="tabpanel">
                                @include('dashboard.survey.pembayaran')
                           </div>

                           <!-- END Step 3 -->
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
                                   <button type="button" class="btn btn-alt-secondary" data-wizard="next">
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
@endpush

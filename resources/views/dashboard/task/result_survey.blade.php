@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-heading font-weight-bold">
                    <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary float-right">Download csv</button>
                    <i class="si si-note mr-5"></i> Hasil Survey
                </h2>
            </div>

            <div class="col-lg-7">
                <!-- Autohide Scrollbar -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Autohide Scrollbar</h3>
                    </div>
                    <div class="block-content" data-toggle="slimscroll" data-height="250px">
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                    </div>
                </div>
                <!-- END Autohide Scrollbar -->
            </div>

        </div>
    </div>
@endsection
@push('js')

    <script src="{{ asset('vendor/assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Page JS Helpers (SlimScroll plugin) -->
    <script>jQuery(function () {
            Codebase.helpers(['slimscroll']);
        });</script>

    <script>
        let json = JSON.parse('{!! $datas !!}')
       // let le = Object.keys(json).length
        console.log(json)
    </script>
@endpush

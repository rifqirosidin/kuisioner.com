
@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        jQuery(function(){ Codebase.helpers('notify', {
            align: 'right',             // 'right', 'left', 'center'
            from: 'top',                // 'top', 'bottom'
            type: 'warning',               // 'info', 'success', 'warning', 'danger'
            icon: 'fa fa-info mr-5',    // Icon class
            message: '{{ $error }}'
        }); })
        @endforeach
    </script>
@endif

@if(Session::has('success'))
    <script>
        jQuery(function(){ Codebase.helpers('notify', {
            align: 'right',             // 'right', 'left', 'center'
            from: 'top',                // 'top', 'bottom'
            type: 'success',               // 'info', 'success', 'warning', 'danger'
            icon: 'fa fa-info mr-5',    // Icon class
            message: '{{ Session::get('success') }}'
        }); })
    </script>
@endif

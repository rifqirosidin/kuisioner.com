@if(session()->has('success'))
    <script>
        toast('Success', '{{ session()->get('success') }}', 'success');
    </script>
@endif

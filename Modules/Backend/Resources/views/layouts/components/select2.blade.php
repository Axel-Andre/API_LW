@push('css')
<link rel="stylesheet" href="{{asset('templates/admin/bower_components/select2/dist/css/select2.min.css')}}">
@endpush
@push('js')
    <script src="{{asset('templates/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('templates/admin/bower_components/select2/dist/js/i18n/fr.js')}}"></script>

    <script>
        $(function() {
            $('.select2').select2();
        })
    </script>

@endpush
@push('css')
<link rel="stylesheet" href="{{asset('templates/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@push('js')
    <script src="{{asset('templates/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('templates/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function() {
            $('.datatable').each(function(){
                $(this).DataTable({
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
                    }
                });
            });
        })
    </script>

@endpush
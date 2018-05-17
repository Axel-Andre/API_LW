<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('APP_NAME')}} @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('templates/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/admin/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/admin/dist/css/skins/_all-skins.min.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack("css")
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('backend::layouts.parts.header')

    @include('backend::layouts.parts.sidebar')

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>{{Lang::Get('backend::core.version.title')}}</b> {{ Lang::Get('backend::core.version.code') }}
        </div>
        {!! Lang::Get('backend::core.copyright') !!}
    </footer>

</div>
<script src="{{asset('templates/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('templates/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('templates/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('templates/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('templates/admin/dist/js/adminlte.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
@stack("js")
</body>
</html>

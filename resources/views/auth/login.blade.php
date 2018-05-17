@extends('layouts.login')

@section('title') | {{Lang::get('auth.login.title')}}@endsection

@section('css')@endsection

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>{{env('app_name')}}</b></a><br/>
            {{Lang::get('auth.login.title')}}
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">{{Lang::get('auth.login.description')}}</p>
            @include('layouts.errors')
            <form action="{{route('login')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="{{Lang::get('fields.login.email')}}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="{{Lang::get('fields.login.password')}}" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> {{Lang::get('fields.login.remember_me')}}
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{Lang::get('fields.login.sign_in')}}</button>
                    </div>
                </div>
            </form>
            <a href="{{route('password.request')}}">{{Lang::get('auth.links.password_forgotten')}}</a><br>
            <a href="{{route('register')}}" class="text-center">{{Lang::get('auth.links.register')}}</a>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
@endsection
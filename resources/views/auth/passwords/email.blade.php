@extends('layouts.login')

@section('title') | {{Lang::get('auth.email.title')}}@endsection

@section('css')@endsection

@section('content')
    <div class="register-box">

        <div class="register-logo">
            <a href="#"><b>{{env('app_name')}}</b></a><br/>
            {{Lang::get('auth.email.title')}}
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{Lang::get('auth.email.description')}}</p>

            @include('layouts.errors')

            <form action="{{route('password.email')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="{{Lang::get('fields.send_reset_password_link.email')}}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{Lang::get('fields.send_reset_password_link.send_reset')}}</button>
                    </div>
                </div>
            </form>
            <a href="{{route('login')}}">{{Lang::get('auth.links.login')}}</a><br>
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
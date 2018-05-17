@extends('layouts.login')

@section('title') | {{Lang::get('auth.register.title')}}@endsection

@section('css')@endsection

@section('content')
    <div class="register-box">

        <div class="register-logo">
            <a href="#"><b>{{env('app_name')}}</b></a><br/>
            {{Lang::get('auth.reset_password.title')}}
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{Lang::get('auth.reset_password.description')}}</p>
            @include('layouts.errors')

            <form action="{{ route('password.request') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{$token}}" />
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="{{Lang::get('fields.reset_password.email')}}" value="{{ $email or old('email') }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="{{Lang::get('fields.reset_password.password')}}" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="{{Lang::get('fields.reset_password.password_confirm')}}" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{Lang::get('fields.reset_password.change_password')}}</button>
                    </div>
                </div>
            </form>

            <a href="{{route('login')}}" class="text-center">{{Lang::get('auth.links.login')}}</a>
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
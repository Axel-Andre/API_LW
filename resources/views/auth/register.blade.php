@extends('layouts.login')

@section('title') | {{Lang::get('auth.register.title')}}@endsection

@section('css')@endsection

@section('content')
    <div class="register-box">

        <div class="register-logo">
            <a href="#"><b>{{env('app_name')}}</b></a><br/>
            {{Lang::get('auth.register.title')}}
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{Lang::get('auth.register.description')}}</p>
            @include('layouts.errors')
            <form action="{{route('register')}}" method="post">
                {{ csrf_field() }}
				<div class="form-group has-feedback">
                    <input name="name" type="name" class="form-control" placeholder="{{Lang::get('fields.register.name')}}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="{{Lang::get('fields.register.email')}}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="{{Lang::get('fields.register.password')}}" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="{{Lang::get('fields.register.password_confirm')}}" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" aria-selected required> {!! Lang::get('fields.register.agree_terms',['route' => '/']) !!}
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{Lang::get('fields.register.sign_up')}}</button>
                    </div>
                </div>
            </form>

            <a href="{{route('login')}}" class="text-center">{{Lang::get('auth.links.already_registered')}}</a>
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
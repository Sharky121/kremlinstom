@extends('layouts.apanel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="login_win jumbotron wow fadeInDown" >
                <h3 class="text-xs-center">Вход</h3>
                <br>
                <br>
                    <form class="form" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="md-form form-group">
                            {{--<i class="fa fa-envelope prefix"></i>--}}
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control validate{{$errors->has('email') ? ' invalid' : ''}}">
                            <label for="email" data-error="" data-success="верно">E-mail</label>
                        </div>

                        <div class="md-form form-group">
                            {{--<i class="fa fa-lock prefix"></i>--}}
                            <input type="password" id="password" name="password" class="form-control validate{{$errors->has('password') ? ' invalid' : ''}}">
                            <label for="password" data-error="" data-success="верно">Пароль</label>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <ul>

                                </ul>
                            </div>
                        @endif
                        <div class="md-form form-group text-xs-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i> Войти
                            </button>
                        </div>




                        {{--<div class="md-form form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

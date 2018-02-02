@extends('layouts.app')
@section('Titel')
    <title>Admin Login</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if(session('status'))
                   <div style="text-align: center;color: green">{{session('status')}}</div>
                @endif
                <div class="panel-heading">Admin Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <label class="col-md-4 control-label">Others way</label>

                            <div class="col-md-6">
                                <a href="{{url('login/facebook')}}"><button style="background:#3B5998;color: white;width: 49%" type="button" class=" w3-hover-blue btn btn-default"><span style="color: white;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" ><i class="fa fa-facebook-square"></i> Login with fb</span></button></a>
                                <a href="{{url('login/google')}}"><button style="background: #D54B3D;color: white;width: 49%"type="button" class=" w3-hover-red btn btn-default"><span  style="color: white;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" ><i class="fa fa-google-plus-square"></i> Login with Gmail</span></button></a>
                            </div>
                        </div>--}}
                       {{-- <div class="form-group">
                            <label class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <a href="{{url('login/twitter')}}"><button style="background:#1DA1F2;color: white;width: 49%" type="button" class=" w3-hover-blue btn btn-default"><span style="color: white;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" ><i class="w3-blue fa fa-twitter-square"></i> Login with twitter</span></button></a>
                                <a href="{{url('login/github')}}"><button style="background: black;color: white;width: 49%"type="button" class=" w3-hover-green btn btn-default"><span  style="color: white;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" ><i class=" fa fa-github"></i> Login with github</span></button></a>
                            </div>
                        </div>--}}
                       {{-- <div class="form-group">
                            <label class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <a  href="{{url('login/linkedin')}}"><button style="background:#283E4A;color: white;width: 100%" type="button" class=" w3-hover-aqua btn btn-default"><span style="color: white;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" ><i class="w3-hover-indigo fa fa-linkedin-square"></i> Login with linkedin</span></button></a>
--}}{{--
                                <a href="{{url('login/Bitbucket')}}"><button style="background: #D54B3D;color: white;width: 49%"type="button" class=" w3-hover-red btn btn-default"><span  style="color: white;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" > Login with Bitbucket</span></button></a>
--}}{{--
                            </div>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

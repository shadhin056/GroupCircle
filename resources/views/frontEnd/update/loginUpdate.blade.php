@extends('frontEnd.master')
@section("Titel")
    BLogin info Update
@endsection()
@section("MainContent")
    <section  id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">Register</div>
                        <h1 class="text-center text-success">{{Session ::get('message')}}</h1>
                        <div class="panel-body">
                            <form name="userUpForm" class="form-horizontal" method="POST" action="{{url('/update/login/save')}}">
                                {{ csrf_field() }}
                                <input  id="id" type="hidden" class="form-control" name="id" value="{{ $userInfoById->id}}" >

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                         {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $userInfoById->name }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-md-4 control-label">Gender</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input id="gender" type="radio"  name="gender" value="male" {{$userInfoById->gender =='male' ? 'checked':'' }} required>Male
                                        </label>
                                        <label class="radio-inline">
                                            <input id="gender" type="radio"  name="gender" value="female" {{$userInfoById->gender =='female' ? 'checked':'' }} required>Female
                                        </label>
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Phone</label>

                                    <div class="col-md-6">
                                        {{--<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>--}}
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $userInfoById->phone }}" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Date of Birth</label>

                                    <div class="col-md-6">
                                        <input id="date" type="date" class="form-control" placeholder="DD/MM/YYYY" name="date" value="{{ $userInfoById->dateOfBirth }}" required autofocus>

                                        @if ($errors->has('date'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input  id="email" type="hidden" class="form-control" name="email" value="{{ $userInfoById->email}}" >
                                        {{ $userInfoById->email}}
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
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-6 ">
                                        <button style="width: 100%" type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
{{--<script>
    document.forms['userUpForm'].elements['gender'].value={{$userInfoById->gender}};
</script>--}}
        </section>

    </section>
@endsection()
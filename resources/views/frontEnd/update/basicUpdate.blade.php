@extends('frontEnd.master')
@section("Titel")
    Basic update
@endsection()
@section("MainContent")
    <section  id="main-content">
        <section class="wrapper">
            <div class="">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                           <h1 class="text-center text-success">{{Session ::get('message')}}</h1>
                            <div class="panel-heading text-center">BASIC INFORMATION</div>

                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{url('/update/save')}}">
                                    {{ csrf_field() }}
                                    <input id="id" type="hidden" class="form-control" name="id" value="{{ $BasicObject->id}}"  autofocus>

                                    <div class="form-group{{ $errors->has('livingIn') ? ' has-error' : '' }}">
                                        <label for="livingIn" class="col-md-4 control-label">Living in</label>

                                        <div class="col-md-6">
{{--
                                            <input id="livingIn" type="text" class="form-control" name="livingIn" value="{{ old('livingIn') }}"  autofocus>
--}}
                                            <input id="livingIn" type="text" class="form-control" name="livingIn" value="{{ $BasicObject->livingIn}}"  autofocus>

                                            @if ($errors->has('livingIn'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('livingIn') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                                        <label for="language" class="col-md-4 control-label">Language</label>

                                        <div class="col-md-6">
                                            {{--<input id="language" type="text" class="form-control" name="language" value="{{ old('language') }}"  autofocus>--}}
                                            <input id="language" type="text" class="form-control" name="language" value="{{ $BasicObject->language}}"  autofocus>

                                            @if ($errors->has('language'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('birthdayPlace') ? ' has-error' : '' }}">
                                        <label for="birthdayPlace" class="col-md-4 control-label">Birthday place</label>

                                        <div class="col-md-6">
                                            {{--<input id="birthdayPlace" type="text" class="form-control" name="birthdayPlace" value="{{ old('birthdayPlace') }}"  autofocus>--}}
                                            <input id="birthdayPlace" type="text" class="form-control" name="birthdayPlace" value="{{ $BasicObject->birthdayPlace}}"  autofocus>

                                            @if ($errors->has('birthdayPlace'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('birthdayPlace') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label for="status" class="col-md-4 control-label">Status </label>
                                        <div class="col-md-6">
                                            <label class="radio-inline">
                                                <input id="status" type="radio" {{$BasicObject->status =='Single' ? 'checked':'' }}  name="status" value="Single" >Single
                                            </label>
                                            <label class="radio-inline">
                                                <input id="status" type="radio" {{$BasicObject->status =='Married' ? 'checked':'' }} name="status" value="Married" >Married
                                            </label>
                                            <label class="radio-inline">
                                                <input id="status" type="radio" {{$BasicObject->status =='Engaged' ? 'checked':'' }} name="status" value="Engaged" >Engaged
                                            </label>
                                            @if ($errors->has('status'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                                        <label for="religion" class="col-md-4 control-label">Religion</label>

                                        <div class="col-md-6">
                                            {{--<input id="religion" type="text" class="form-control" name="religion" value="{{ old('religion') }}"  autofocus>--}}
                                            <input id="religion" type="text" class="form-control" name="religion" value="{{ $BasicObject->religion}}"  autofocus>

                                            @if ($errors->has('religion'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="form-group{{ $errors->has('bloodGroup') ? ' has-error' : '' }}">
                                        <label for="bloodGroup" class="col-md-4 control-label">Blood Group</label>
                                        <div class="col-md-6">
                                            {{--<input id="bloodGroup" type="text" class="form-control" name="bloodGroup" value="{{ old('bloodGroup') }}" >--}}
                                            <input id="bloodGroup" type="text" class="form-control" name="bloodGroup" value="{{ $BasicObject->bloodGroup}}" >

                                            @if ($errors->has('bloodGroup'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('bloodGroup') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('socialNetwork') ? ' has-error' : '' }}">
                                        <label for="socialNetwork" class="col-md-4 control-label">Social network</label>

                                        <div class="col-md-6">
{{--
                                            <textarea id="socialNetwork" class="form-control" name="socialNetwork"  >{{ old('socialNetwork') }}</textarea>
--}}
                                            <textarea id="socialNetwork" class="form-control" name="socialNetwork"  >{{ $BasicObject->socialNetwork}}</textarea>
                                            @if ($errors->has('socialNetwork'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('socialNetwork') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address" class="col-md-4 control-label">Address</label>

                                        <div class="col-md-6">
                                            {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}
                                            <textarea id="address" class="form-control" name="address"  >{{ $BasicObject->address}}</textarea>
{{--
                                            <textarea id="address" class="form-control" name="address"  >{{ old('address') }}</textarea>
--}}
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-6 ">
                                            <button style="width: 100%" type="submit" class="btn btn-primary">
                                                Update info
                                            </button>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>

    </section>
@endsection()
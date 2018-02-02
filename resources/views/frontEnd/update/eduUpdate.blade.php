@extends('frontEnd.master')
@section("Titel")
    Educational info update
@endsection()
@section("MainContent")
    <section  id="main-content">
        <section class="wrapper">
            <div class="">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <h1 class="text-center text-success">{{Session ::get('message')}}</h1>
                            <div class="panel-heading text-center">EDUCATION AND QUALIFICATION</div>

                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{url('/update/save2')}}">
                                    {{ csrf_field() }}
                                    <input  id="id" type="hidden" class="form-control" name="id" value="{{ $userInfoById->id}}" >

                                    <div class="form-group{{ $errors->has('schools') ? ' has-error' : '' }}">
                                        <label for="schools" class="col-md-4 control-label">Schools</label>

                                        <div class="col-md-6">
{{--
                                            <textarea id="schools" class="form-control" name="schools"  >{{ old('schools') }}</textarea>
--}}
                                            <textarea id="schools" class="form-control" name="schools"  >{{ $userInfoById->schools}}</textarea>
                                            @if ($errors->has('schools'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('schools') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('college') ? ' has-error' : '' }}">
                                        <label for="college" class="col-md-4 control-label">College</label>

                                        <div class="col-md-6">
                                            {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}
                                            <textarea id="college" class="form-control" name="college"  >{{ $userInfoById->college}}</textarea>
{{--
                                            <textarea id="college" class="form-control" name="college"  >{{ old('college') }}</textarea>
--}}
                                            @if ($errors->has('college'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('college') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('highSchools') ? ' has-error' : '' }}">
                                        <label for="highSchools" class="col-md-4 control-label">High schools</label>

                                        <div class="col-md-6">
{{--
                                            <textarea id="highSchools" class="form-control" name="highSchools"  >{{ old('highSchools') }}</textarea>
--}}
                                            <textarea id="highSchools" class="form-control" name="highSchools"  >{{ $userInfoById->highSchools}}</textarea>
                                            @if ($errors->has('highSchools'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('highSchools') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('university') ? ' has-error' : '' }}">
                                        <label for="university" class="col-md-4 control-label">University</label>

                                        <div class="col-md-6">
                                            <textarea id="university" class="form-control" name="university"  >{{ $userInfoById->university}}</textarea>
{{--
                                            <textarea id="university" class="form-control" name="university"  >{{ old('university') }}</textarea>
--}}
                                            @if ($errors->has('university'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('professionalSkills') ? ' has-error' : '' }}">
                                        <label for="professionalSkills" class="col-md-4 control-label">Professional skills</label>

                                        <div class="col-md-6">
{{--
                                            <textarea id="professionalSkills" class="form-control" name="professionalSkills"  >{{ old('professionalSkills') }}</textarea>
--}}
                                            <textarea id="professionalSkills" class="form-control" name="professionalSkills"  >{{ $userInfoById->professionalSkills}}</textarea>
                                            @if ($errors->has('professionalSkills'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('professionalSkills') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('personalSkills') ? ' has-error' : '' }}">
                                        <label for="personalSkills" class="col-md-4 control-label">Personal skills</label>

                                        <div class="col-md-6">
{{--
                                            <textarea id="personalSkills" class="form-control" name="personalSkills"  >{{ old('socialNetwork') }}</textarea>
--}}
                                            <textarea id="personalSkills" class="form-control" name="personalSkills"  >{{ $userInfoById->personalSkills}}</textarea>
                                            @if ($errors->has('personalSkills'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('personalSkills') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('technicalSkills') ? ' has-error' : '' }}">
                                        <label for="technicalSkills" class="col-md-4 control-label">Technical skills</label>

                                        <div class="col-md-6">
{{--
                                            <textarea id="technicalSkills" class="form-control" name="technicalSkills"  >{{ old('technicalSkills') }}</textarea>
--}}
                                            <textarea id="technicalSkills" class="form-control" name="technicalSkills"  >{{ $userInfoById->technicalSkills}}</textarea>
                                            @if ($errors->has('technicalSkills'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('technicalSkills') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('achievement') ? ' has-error' : '' }}">
                                        <label for="achievement" class="col-md-4 control-label">Achievement</label>

                                        <div class="col-md-6">
{{--
                                            <textarea id="achievement" class="form-control" name="achievement"  >{{ old('achievement') }}</textarea>
--}}
                                            <textarea id="achievement" class="form-control" name="achievement"  >{{ $userInfoById->achievement}}</textarea>
                                            @if ($errors->has('achievement'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('achievement') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('others') ? ' has-error' : '' }}">
                                        <label for="others" class="col-md-4 control-label">Others</label>

                                        <div class="col-md-6">
                                            <textarea id="others" class="form-control" name="others"  >{{ $userInfoById->others}}</textarea>
{{--
                                            <textarea id="others" class="form-control" name="others"  >{{ old('others') }}</textarea>
--}}
                                            @if ($errors->has('others'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('others') }}</strong>
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
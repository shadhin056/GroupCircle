@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editor Dashboard  <a class="pull-right" href="{{url('/admin/share')}}"> See Total register user
                        </a></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in as editor!

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

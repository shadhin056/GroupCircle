@extends('frontEnd.master')
@section("Titel")
    Chat
@endsection()
@section("MainContent")
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-sm-4" style="padding: 22px;background-color:white;">

                    <li class="list-group-item list-group-item-info">User List</li>
                    <ul style="overflow-y: scroll;height: 350px;" class="list-group">
                        @foreach($userAll as $user)
                            <a href="{{url('/privateChat/'.$user->id)}}">
                                @if($user->id ==$userName->id)
                                <li style="color: white;background: black" class="list-group-item list-group-item-warning">{{$user->name}}</li>
                                    @else
                                    <li class="list-group-item list-group-item-warning">{{$user->name}}</li>
                                @endif
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-6" style="background-color:pink;">
                    <div style="padding: 22px;background: white" class="row">

                        <li class="list-group-item list-group-item-info">Chat History with <a style="color: black; font-weight: 900;" href="{{url('/profile/'.$userName->id)}}">{{$userName->name}}</a></li>
                        <ul style="overflow-y: scroll;height: 300px;" class="list-group">

                                @foreach($chatData as $chatDatas)
                                    @if($chatDatas->FormId ==Auth::user()->id)
                            <div id="chatTable">
                                <li  style="color: white;background: #f9a544" class="list-group-item list-group-item-danger">{{$chatDatas->txt}}</li>
                                <span class="label label-success">{{$chatDatas->time}}</span>
                                <span class="label label-success">{{$chatDatas->FormId ==Auth::user()->id ? 'you':$chatDatas->FormName}}</span>

                            </div>
                                        @else
                                    <div id="chatTable">
                                        <li   style="color: white;background: #cfa1e1" class="list-group-item list-group-item-warning">{{$chatDatas->txt}}</li>
                                        <span class="label label-success">{{$chatDatas->time}}</span>
                                        <span class="label label-success">{{$chatDatas->FormId ==Auth::user()->id ? 'you':$chatDatas->FormName}}</span>

                                    </div>
                                    @endif
                                    @endforeach


                        </ul>

                        <div class="input-group">

                            <input id="pCText" type="text" class="form-control" placeholder="Search">
                            <input hidden id="toText" name="toText" type="text"  value="{{$toUser->id}}">
                            <input hidden id="toName" name="toName" type="text"  value="{{$toUser->name}}">
                            <input hidden id="formText" name="formText" type="text" value="{{Auth::user()->id}}">
                            <input hidden id="FormName" name="FormName" type="text" value="{{Auth::user()->name}}">

                            <div class="input-group-btn">
                                <button id="addPriChat" class="btn btn-default" type="submit">
                                    <i class="fa fa-check-square-o"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-2" style="background-color:pink;">
                </div>
            </div>
        </section>
        {{csrf_field()}}
        <script>


            $('#addPriChat').click(function (event) {
                var pCText =$('#pCText').val();
                var toText =$('#toText').val();
                var toName =$('#toName').val();
                var formText =$('#formText').val();
                var FormName =$('#FormName').val();
                    $.post('/pChat',{'pCText':pCText,'toName':toName,'FormName':FormName,'toText':toText,'formText':formText,'_token':$('input[name=_token]').val()},function (data) {
                        console.log(data);

                        $('#chatTable').load(location.href +' #chatTable');
                        $('#pCText').val('');
                    });



            });




        </script>

    </section>

    {{-- <script src="js/lightbox-plus-jquery.min.js"> </script>--}}
    <script src="{{asset('frontEnd/js/lightbox-plus-jquery.min.js')}}"></script>
@endsection()
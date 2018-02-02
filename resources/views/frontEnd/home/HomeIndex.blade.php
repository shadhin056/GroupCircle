@extends('frontEnd.master')
@section("Titel")
    Home
@endsection()
@section("MainContent")
    <section  id="main-content">
        <section class="wrapper">


            <div class="agil-info-calendar">
                <!-- calendar -->
                <div class="col-md-7 agile-calendar">
                    <!--<div style="width: 50%" class="agile-calendar">-->
                    <div  id="resposeDiv" class="row">
                        <?php $i=0;?>
                        @foreach($statusDataAlls as $statusDataAll)



                        <div style="padding: 5px;border: 1px solid #DDA2A4" class="w3-card-4 col-sm-12">
                            <div style="padding: 2px;border:1px solid #F4511E" class="panel panel-default text-left">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="media">
                                                <div  class="media-left">
                                                    <img  {{$statusDataAll->anonymous =='on' ? 'src="" ':'' }} src="{{asset($statusDataAll->proPic)}}" class="media-object"
                                                         style="width:60px">
                                                </div>
                                                <div class="media-body">
                                                    <h3  {{$statusDataAll->anonymous =='on' ? 'hidden':'' }} style="color: #F4511E" class="media-heading">{{$statusDataAll->name}}</h3><span class="glyphicon glyphicon-time"></span>
                                                    <small><i>Posted on <b> {{$statusDataAll->post_time}}</b></i></small><br><span class="	fa fa-user-o"></span>
                                                    <small><i>Posted by <b> {{$statusDataAll->anonymous =='on' ? 'Anonymous Post':$statusDataAll->name }}</b></i></small><br><span class="fa fa-folder-o"></span>
                                                    <small><i>Post type<b> {{$statusDataAll->option}}</b></i></small><br><span class="fa fa-commenting-o"></span>
                                                    <small><i>Comment <b> {{$statusDataAll->whoSee}}</b></i></small>

                                                    <div class="w3-row-padding" style="padding-top: 3%;padding-bottom: 3%">






                                                        @foreach ($imageid as $flight)
                                                        @if ($statusDataAll->imageId==$flight->imageId)

                                                            <img height="250" width="240" class="w3-card-4 {{-- w3-image w3-col s10--}} "  src="{{asset($flight->upload_photo)}}"
                                                                 style=";margin-bottom: 5px" alt=""
                                                                 >

                                                        @endif
                                                        @endforeach
                                                       {{-- <img class="w3-image w3-col s10 "  src="{{asset($statusDataAll->upload_photo)}}"
                                                             style="height: 60%" alt=""
                                                        >--}}
                                                        {{--<div class="w3-half">
                                                            <img width='240px' height='240px' src="{{asset($statusDataAll->upload_photo)}}"
                                                                 style="width:100%" alt="Nature"
                                                                 class="w3-margin-bottom">
                                                        </div>--}}
                                                    </div>
                                             {{--       <div class="w3-row-padding" style="margin:0 -16px">

                                                        <div class="">
                                                            <video width="100%" controls>
                                                                <source src="{{asset('FrontEnd/video/1.MP4')}}"
                                                                        type="video/mp4">

                                                                Your browser does not support HTML5 video.
                                                            </video>
                                                        </div>
                                                    </div>--}}
                                                    <div style="border: 1px solid #ff7122" class="well well-lg comment">{!! $statusDataAll->status !!}</div>

                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div>
                                    {{--<button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-thumbs-up"></span> <kbd>7</kbd>
                                        <!--<span class="badge">7</span>-->
                                    </button>

                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-thumbs-down"></span> <kbd>7</kbd>

                                    </button>--}}


                                    <button data-toggle="collapse" data-target="#{{$statusDataAll->id}}" type="button"
                                            class="btn btn-default btn-sm ">
                                        <span class="glyphicon glyphicon-comment"></span>{{-- <kbd>7</kbd>--}}

                                    </button>

                                    <a {{$statusDataAll->whoSee =='NotAllow' ? 'data-target="#Response3333"':'' }} id="addResponseMainbutton" data-toggle="modal" data-target="#Response" type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-share-alt">Response</span>
                                        <input type="hidden" id="responsepostUserID" value="{{Auth::user()->id}}">
                                        <input type="hidden" id="responsepostPostID" value="{{$statusDataAll->id}}">
                                    </a>
                                        @if($statusDataAll->user_id ==Auth::user()->id)
                                    <div class="pull-right btn-group">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                                data-toggle="dropdown">
                                            <span class="caret"></span></button>

                                        <ul   class="dropdown-menu" role="menu">
                                            <li><a onclick="return confirm('Are you sure to delete')"  href="{{url('/status/delete/'.$statusDataAll->id)}}">Delete</a>
                                            </li>
                                            <li><a href="{{url('/status/edit/'.$statusDataAll->id)}}">Eidt</a>
                                            </li>
                                        </ul>


                                    </div>
                                        @else
                                        @endif
                                </div>
                                </div>

                                <div id="{{$statusDataAll->id}}" class="collapse">

                                  {{--  <form action="/action_page.php">
                                        <div style="margin: 15px" class="input-group">
                                            <input type="text" class="form-control" placeholder="Comment" name="search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i
                                                            class="glyphicon glyphicon-hand-down"></i></button>
                                            </div>
                                        </div>
                                    </form>--}}
                                    @foreach ($responseId as $responseIds)
                                        @if ($statusDataAll->id == $responseIds->post_id)
                                    <div style="margin: 15px ; border: 1px solid  #09A416" class="well well-sm ">
<div id="{{$responseIds->id}}">
    <div id="shadhin">
                                        <div  class="media">
                                            <div class="media-left">
                                                <img {{$responseIds->anonymous =='anonymous' ? 'src="" ':'' }} src="{{asset($responseIds->proPic)}}" class="media-object"
                                                     style="width:60px">
                                            </div>
                                           {{-- <h1>{{$responseIds->id}}</h1>--}}
                                            <div class="media-body">
                                                <h3 {{$responseIds->anonymous =='anonymous' ? 'hidden':'' }} style="color: #F4511E" class="media-heading">{{$responseIds->name}}</h3><span class="glyphicon glyphicon-time"></span>
                                                <small><i>Posted on  {{$responseIds->post_time}}</i></small>
                                                <p  {{$responseIds->user_id == Auth::user()->id ? '':'data-target="#Response11"' }} style="background: white;padding: 5px; border: 1px solid #ff7122" data-toggle="modal" data-target="#Response" class="well well-sm ourResponsecomment">
                                                    <input type="hidden" id="responsepostID" value="{{$responseIds->id}}">

                                                    {{$responseIds->Response}}
                                                </p>
                                            </div>
                                        </div>
                                        {{--<button type="button" class="btn btn-default btn-sm">
                                            <span class="glyphicon glyphicon-thumbs-up"></span> <kbd>7</kbd>
                                            <!--<span class="badge">7</span>-->
                                        </button>--}}

                                        {{--<button type="button" class="btn btn-default btn-sm">
                                            <span class="glyphicon glyphicon-thumbs-down"></span> <kbd>7</kbd>

                                        </button>--}}

                                        {{--<div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span></button>

                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Delete</a>
                                                </li>
                                                <li><a href="#">Smartphone</a>
                                                </li>
                                            </ul>
                                        </div>--}}
    </div></div>
                                    </div>
                                        @endif
                                   @endforeach
                                </div>
                            </div>
                        </div>
                                <?php $i++; ?>
                            @endforeach
                    </div>
                    {{--<div style="margin: 10px;">{{$statusDataAlls->hasMorePages()}}</div>
                    <div style="margin: 10px;">{{$statusDataAlls->total()}}</div>
                    <div style="margin: 10px;">{{$statusDataAlls->currentPage()}}</div>--}}
                    <div style=";margin: 10px;">{{$statusDataAlls->links()}}</div>

                </div>
                <!-- //calendar -->
                <div class="col-md-4 w3agile-notifications">
                   {{-- <div class="w3-card-4 notifications">
                        <!--notification start-->

                        <header class="panel-heading">
                            Notification
                        </header>
                        <div class="notify-w3ls w3-small">
                            <div class="alert alert-info clearfix">
                                <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                                <div class="notification-info">
                                    <ul class="clearfix notification-meta">
                                        <li class="pull-left notification-sender"><span><a
                                                        href="#">Jonathan Smith</a></span> send you a mail
                                        </li>
                                        <li class="pull-right notification-time">1 min ago</li>
                                    </ul>
                                    <p w3-small>
                                        Urgent meeting for next proposal
                                    </p>
                                </div>
                            </div>
                            <div class="alert alert-danger">
                                <span class="alert-icon"><i class="fa fa-facebook"></i></span>
                                <div class="notification-info">
                                    <ul class="clearfix notification-meta">
                                        <li class="pull-left notification-sender"><span><a
                                                        href="#">Jonathan Smith</a></span> mentioned you in a post
                                        </li>
                                        <li class="pull-right notification-time">7 Hours Ago</li>
                                    </ul>
                                    <p>
                                        Very cool photo jack
                                    </p>
                                </div>
                            </div>
                            <div class="alert alert-success ">
                                <span class="alert-icon"><i class="fa fa-comments-o"></i></span>
                                <div class="notification-info">
                                    <ul class="clearfix notification-meta">
                                        <li class="pull-left notification-sender">You have 5 message unread</li>
                                        <li class="pull-right notification-time">1 min ago</li>
                                    </ul>
                                    <p>
                                        <a href="#">Anjelina Mewlo, Jack Flip</a> and <a href="#">3 others</a>
                                    </p>
                                </div>
                            </div>
                            <div class="alert alert-warning ">
                                <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                                <div class="notification-info">
                                    <ul class="clearfix notification-meta">
                                        <li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead
                                        </li>
                                        <li class="pull-right notification-time">5 Days Ago</li>
                                    </ul>
                                    <p>
                                        Next 5 July Thursday is the last day
                                    </p>
                                </div>
                            </div>
                            <div class="alert alert-info clearfix">
                                <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                                <div class="notification-info">
                                    <ul class="clearfix notification-meta">
                                        <li class="pull-left notification-sender"><span><a
                                                        href="#">Jonathan Smith</a></span> send you a mail
                                        </li>
                                        <li class="pull-right notification-time">1 min ago</li>
                                    </ul>
                                    <p>
                                        Urgent meeting for next proposal
                                    </p>
                                </div>
                            </div>

                        </div>

                        <!--notification end-->
                    </div>--}}
                </div>


                <div class="clearfix"></div>
            </div>
            <!-- tasks -->

            <!-- //tasks -->
            <script language="javascript">
                $(document).ready(function() {

                    $(".comment").shorten();

                    $(".comment-small").shorten({showChars: 10});

                });
            </script>
        </section>
        <!-- footer -->


        <!-- / footer -->
    </section>

    <div id="Response" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <b> <h4 class="modal-title" id="titleButton">   </h4></b>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <input type="hidden" id="responseUserId">
                    <input type="hidden" id="responsePostId">
                    <p><input id="addcomment" style="height:100px" class="form-control "  type="text" placeholder="share your thought"></p>
                    <select class="form-control" name="responseAnonymous" id="responseAnonymous">
                        <option value="anonymous">Anonymous</option>
                        <option value="notAnonymous">Not anonymous</option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" id="deleteButton" style="display: none" class="btn btn-warning" data-dismiss="modal">Delete</button>
                    <button type="button" id="SaveEditButton" style="display: none" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                    <button type="button" id="addButton" class="btn btn-primary">Share</button>
                    <button type="button" id="closeNow" class="btn btn-default" style="display: none" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   {{csrf_field()}}

    <script>
        $(document).ready(function () {
            $(document).on('click','.ourResponsecomment',function (event) {

                    var text=$(this).text();
                    var id=$(this).find('#responsepostID').val();

                    $('#titleButton').text('Edit your Response');
                    var text=$.trim(text);
                    $('#deleteButton').show('6000');
                    $('#addcomment').show('9000');
                    $('#SaveEditButton').show('6000');
                    $('#addButton').hide('6000');
                    $('#responseAnonymous').hide('6000');
                    $('#addcomment').val(text);
                    $('#id').val(id);

                    console.log(text);

            });

            $(document).on('click','#addResponseMainbutton',function (event) {
                var responsepostUserID=$(this).find('#responsepostUserID').val();
                var responsepostPostID=$(this).find('#responsepostPostID').val();
                $('#titleButton').text('share your thought');
                $('#deleteButton').hide('6000');
                $('#SaveEditButton').hide('6000');
                $('#SaveEditButton').hide('6000');
                $('#addButton').show('6000');
                $('#responseAnonymous').show('6000');
                $('#addcomment').val('');
                $('#responsePostId').val(responsepostPostID);
                $('#responseUserId').val(responsepostUserID);
            });

            $('#addButton').click(function (event) {
                var text =$('#addcomment').val();
                var responseAnonymous =$('#responseAnonymous').val();

                $('#addButton').show('9000');
                $('#addcomment').show('9000');
                $('#closeNow').show('9000');

                var user_id =$('#responseUserId').val();
                var post_id =$('#responsePostId').val();
                if(text==''){
                    alert('please type anything for response');
                }else {

                    $('#titleButton').text('your shared your thought');
                    $('#addcomment').val('');
                    $('#addcomment').hide('9000');
                    $('#addButton').hide('9000');
                    $('#closeNow').show('9000');


                    $.post('/response/add',{'text':text,'responseAnonymous':responseAnonymous,'user_id':user_id,'post_id':post_id,'_token':$('input[name=_token]').val()},function (data) {
                        console.log(data);
                        $('#resposeDiv').load(location.href +' #resposeDiv');
                    });
                    $('#addButton').show('9000');
                    $('#addcomment').show('9000');
                }


            });
            $('#deleteButton').click(function (event) {
                var id=$('#id').val();
                var a='#';
                var b=a+id;
                $.post('/response/delete',{'id':id,'_token':$('input[name=_token]').val()},function (data) {
                    console.log(data);
                  //  $('#resposeDiv').load(location.href +' #resposeDiv');
                    $(b).load(location.href +' '+b);
                });

            });

            $('#SaveEditButton').click(function (event) {
                var id=$('#id').val();
                var a='#';
                var b=a+id;
                console.log(b);
                var value=$('#addcomment').val();
                $.post('/response/update',{'id':id,'value':value,'_token':$('input[name=_token]').val()},function (data) {
                    $(b).load(location.href +' '+b);
                    //setInterval()

                });

            });

        });
        
    </script>

{{--<script>
    function loadlink(){
        $('#shadhin').load('#shadhin',function () {
        });
    }

    loadlink(); // This will run on page load
    setInterval(function(){
        loadlink() // this will run after every 5 seconds
    }, 5000);

</script>--}}
   {{-- <script>
        setInterval(
            function () {
                $('#jahid').load('#jahid');
            },3000);

    </script>--}}
@endsection()
<!DOCTYPE html>
<head>
    <title>Edit Status</title>
@include('frontEnd.includes.HeaderTop')
<body style="background: #FFE9E0">

@include('frontEnd.includes.chatBoxMain')
<section id="container">
    <!--header start-->
@include('frontEnd.includes.header')
<!--header end-->
    <!--sidebar start-->
@include('frontEnd.includes.menubar')
<!--sidebar end-->
    <!--main content start-->

    <section id="main-content">
        <section class="wrapper">
            <div class="">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <h1 class="text-center text-success">{{Session ::get('message')}}</h1>
                            <div class="panel-heading text-center">Status Edit</div>
                            <form id="myformstatus" name="myformstatus" class="form-horizontal"
                                  enctype="multipart/form-data" method="POST" action="{{url('/status/update')}}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <input type="hidden" name="Statusid" value="{{$StatusById->id}}">
                                        <input type="hidden" name="userId" value="{{$StatusById->user_id}}">
                            <textarea name="status" id='status' class="form-control"
                                      style="max-width: 100% ; width: 100%"> {{$StatusById->status}}</textarea>
                                    </div>
                                </div>
                                @if ($errors->has('status'))
                                    <span class="text-danger help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group row">
                                    <div class="col-xs-4">
                                        <select name="whoSee" class="form-control" id="whoSee">
                                            <option {{$StatusById->whoSee =='Allow' ? 'selected':'' }} value="Allow">
                                                Allow Comment
                                            </option>
                                            <option {{$StatusById->whoSee =='NotAllow' ? 'selected':'' }} value="NotAllow">
                                                Comment not Allow
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select required id="mySelect1" name="option1" class="form-control"
                                                id="option1">
                                            <option value="" disabled selected>Post Type</option>
                                            <option {{$StatusById->option =='About me' ? 'selected':'' }} value="About me">
                                                About me
                                            </option>
                                            <option {{$StatusById->option =='Game' ? 'selected':'' }}value="Game">Game
                                            </option>
                                            <option {{$StatusById->option =='Movie' ? 'selected':'' }} value="Movie">
                                                Movie
                                            </option>
                                            <option {{$StatusById->option =='Song' ? 'selected':'' }} value="Song">
                                                Song
                                            </option>
                                            @foreach($CategoryListById as $CategoryListById)
                                                <option {{$StatusById->option ==$CategoryListById->Category_name ? 'selected':'' }} value={{$CategoryListById->Category_name}} >{{$CategoryListById->Category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <input id="CatValue1" type="text" value="Add new type" class="form-control"
                                                   placeholder="Add new type" name="search">
                                            <div class="input-group-btn">
                                                {{-- <button onclick="myFunctionCategory()" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                --}} <a type="button" class="btn btn-default"
                                                        onclick="myFunctionCategory1()"><i
                                                            class="fa fa-arrow-left"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-8">
                                        {{-- <label style="cursor: pointer;" for="upload-photo"><i class="fa fa-photo" style="font-size:20px; color:green"> Add Photo/Video</i></label>
                                         <input style="opacity: 1;position: absolute;z-index: -1;" accept="image/*" type="file" name="upload-photo" id="upload-photo" />

             --}} <label>                   @foreach($StatusByImage as $StatusByImage)
                                            <img height="150" alt="" width="150"
                                                 src="{{asset($StatusByImage->upload_photo)}}">
                                                @endforeach
                                        </label><br><br>
                                        <div style="color: red"> Upload New File will Delete Old files if it has</div>
                                        <br>

                                        <i id='fadeid'
                                           style="color:green;margin-right: 10px;cursor: pointer;font-size: 20px;"
                                           class="fa fa-camera"></i><span class="name">No file selected</span>
                                        <input style=" display: none;" accept="image/*" type="file" multiple  name="upload_photo[]"
                                               id="upload_photo">


                                    </div>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group row">

                                    <div class="col-xs-4">
                                        <label><input {{$StatusById->anonymous =='on' ? 'checked':'' }}
                                                      id="anonymous" type="checkbox" name="anonymous"><b
                                                    style="color: #ff7122">
                                                Keep Anonymous</b></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-4">

                                        <button title="Publish status" type="submit" class="btn btn-warning btn-block">
                                            <i class="fa fa-check-square-o"></i>
                                            Publish
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="panel-body">


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <script>


            function myFunctionCategory1() {
                var x = document.getElementById("mySelect1");
                var option = document.createElement("option");
                option.text = document.getElementById("CatValue1").value;
                x.prepend(option);
            }

            $(document).ready(function () {
                $(window).keydown(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
            });

            //photo


            $("#fadeid").click(function () {
                $("input[type='file']").trigger('click');
            });

            $('input[type="file"]').on('change', function () {
                var val = $(this).val();
                $(this).siblings('span').text(val);
            })

        </script>
    </section>

@include('frontEnd.includes.msgbox')
<!--main content end-->
</section>
@include('frontEnd.includes.scriptFile')
<script>

</script>
</body>
</html>
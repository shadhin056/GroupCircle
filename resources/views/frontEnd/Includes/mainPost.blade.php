{{--<div id="id01" class="w3-modal">
    <section style="margin-left: 20%;margin-right: 20%" class="w3-card-4 w3-animate-zoom w3-center panel">
        <div class="compose-mail">
            <form class="w3-container" method="post">
                <label><b>Write your post</b></label><br><br>
                <textarea style="margin-left: 3.5%;margin-right: 3.5% ;max-width: 93%;height: 120px "
                          class="w3-input w3-border " placeholder="Share Your idea"></textarea>
                <br>
                <div class="w3-row-padding">
                    <div class="w3-third">
                        <label>Select category</b></label></div>
                    <div class="w3-third">
                        <label>Add new</b></label></div>
                    <div class="w3-third">
                        <label>Insert </b></label></div>
                </div>
                <div class="w3-row-padding">

                    <div class="w3-third">
                        <select id="mySelect" name="option" class="w3-select w3-border">
                            <option value="" disabled selected>Choose your Category</option>
                            <option value="1">About me</option>
                            <option value="2">Movie</option>
                            <option value="3">Games</option>
                        </select>
                    </div>
                    <div class="w3-third">
                        <input id="CatValue" value="Games" style="width: 100%;height:40px;border-radius: 0px"
                               class="w3-input w3-border w3-round-large" type="text">
                    </div>
                    <div class="w3-third">
                        <a type="button" class="w3-block  w3-button w3-white w3-border" onclick="myFunctionCategory()">Insert
                            Category</a>
                    </div>
                </div>
                <div class="w3-row-padding">
                    <div class="w3-third">
                        <label>Post Type</b></label>
                    </div>
                    <div class="w3-third">
                        <label>File upload</b></label>
                    </div>
                    <div class="w3-third">

                    </div>
                </div>
                <div class="w3-row-padding">
                    <div class="w3-third">
                        <select class="w3-select w3-border" name="option">
                            <option value="1">Anonymous</option>
                            <option value="2">Not anonymous</option>
                        </select>
                    </div>
                    <div class="w3-third">
                        <input style="height: 40px;width: 100%" class="w3-input w3-border" type="file">
                    </div>
                    <div class="w3-third">

                        <button class="w3-button w3-block w3-green" type="submit">Publish</button>
                    </div>
                </div>

                <div class="w3-row-padding">
                    <div class="w3-third">
                    </div>
                    <div class="w3-third">

                    </div>
                    <div class="w3-third">
                        <button style="width: 100%;margin-top: 3%"
                                onclick="document.getElementById('id01').style.display='none'" type="button"
                                class="w3-button w3-red">Cancel
                        </button>
                    </div>
                </div>


                <br><br>
            </form>
        </div>

    </section>


</div>--}}





<!-- Modal -->
<div class="modal fade" id="myModalShadhin" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div style="padding: 3%" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">What's on your mind</h4>
            </div>
            <div class="">

                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('/status')}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <textarea name="status" id='status' class="form-control"
                                      style="max-width: 100% ; width: 100%"></textarea>
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
                                <option selected value="Allow">Allow Comment</option>
                                <option value="NotAllow">Comment not Allow</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select required id="mySelect" name="option" class="form-control" id="option">
                                <option value="" disabled selected>Post Type</option>
                                <option value="About me">About me</option>
                                <option value="Game">Game</option>
                                <option value="Movie">Movie</option>
                                <option value="Song">Song</option>
                                @foreach($CategoryListById as $CategoryListById)
                                <option value={{$CategoryListById->Category_name}} >{{$CategoryListById->Category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <div class="input-group">
                                <input id="CatValue" type="text" value="Add new type" class="form-control"
                                       placeholder="Add new type" name="search">
                                <div class="input-group-btn">
                                    {{-- <button onclick="myFunctionCategory()" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    --}} <a type="button" class="btn btn-default" onclick="myFunctionCategory()"><i
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

 --}}

                            <i id='fadeid' style="color:green;margin-right: 10px;cursor: pointer;font-size: 20px;"
                               class="fa fa-camera"></i><span class="name">No file selected</span>
                            <input style=" display: none;" accept="image/*" multiple type="file" name="upload_photo[]"
                                   id="upload_photo">


                        </div>
                    </div>
                    {{--@if ($errors->has('upload_photo.1'))
                        <span class="text-danger help-block">
                                        <strong>{{ $errors->first('upload_photo.1') }}</strong>
                                    </span>
                    @endif--}}

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
                            <label><input id="anonymous" type="checkbox" name="anonymous"><b style="color: #ff7122">
                                    Keep Anonymous</b></label>
                        </div>
                    </div>
                    <input hidden id="idU" type="text" name="idU">
                    <div class="form-group row">
                        <div class="col-xs-4">

                            <button  title="Publish status" type="submit" class="btn btn-warning btn-block"><i class="fa fa-check-square-o"></i>
                                Publish
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    function myFunctionCategory() {
        var x = document.getElementById("mySelect");
        var option = document.createElement("option");
        option.text = document.getElementById("CatValue").value;
        x.prepend(option);
        $('#CatValue').val('Added');
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


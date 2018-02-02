@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Total Register User</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table id="userTable" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{--<th>Edit</th>
                                    <th>Delete</th>--}}
                                </tr>
                                </thead>
                                @foreach($userAll as $userByid)
                                    <tbody >
                                    <tr>
                                        <td>{{$userByid->id}}</td>
                                        <div>
                                            <td data-toggle="modal" data-target="#UserModal" class="ourUserData"><span style="color: black" class="glyphicon glyphicon-edit">  </span> {{$userByid->email}}
                                                <input type="hidden" id="userEmail" value="{{$userByid->email}}">
                                                <input type="hidden" id="userName" value="{{$userByid->name}}">
                                                <input type="hidden" id="userId" value="{{$userByid->id}}">
                                            </td>
                                        </div>
                                        <td>{{$userByid->name}}</td>

                                        {{--<td> <button type="button" class="btn btn-warning">Edit</button></td>
                                        <td> <button type="button" class="btn btn-danger">Delete</button></td>--}}
                                    </tr>

                                    </tbody>
                                @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="UserModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <b> <h4 class="modal-title" id="titleButton">   </h4></b>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" >
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">ID :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="id" placeholder="Enter phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Name :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                            </div>
                        </div>
                        <input type="hidden" id="id">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email :</label>
                            <div class="col-sm-10">
                                <input disabled required type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                        </div>


                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" id="deleteButton" style="display: none" class="btn btn-warning" data-dismiss="modal">Delete</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{csrf_field()}}

    <script>
        $(document).ready(function () {
            $(document).on('click','.ourUserData',function (event) {

                var text=$(this).text();;
                var email=$(this).find('#userEmail').val();
                var id=$(this).find('#userId').val();
                var name=$(this).find('#userName').val();

                $('#titleButton').text('Delete User Data');
                var text=$.trim(text);
                $('#deleteButton').show('6000');
                $('#email').val(text);
                $('#name').val(name);
                $('#id').val(id);

                console.log(text);

            });



            $('#deleteButton').click(function (event) {
                var id=$('#id').val();
                $.post('/user/delete',{'id':id,'_token':$('input[name=_token]').val()},function (data) {
                    console.log(data);
                    //  $('#resposeDiv').load(location.href +' #resposeDiv');
                    $('#userTable').load(location.href +' #userTable');
                });

            });



        });

    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Dashboard (List Of Editor)  <a class="pull-right" href="{{url('/admin/share')}}"> See Total register user
                        </a></div>


                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <a id="addAdminMainbutton" data-toggle="modal" data-target="#AdminModal" type="button" class="btn btn-success">Add new Editor</a><br>

                            <table id="adminTable" class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>

                                    {{--<th>Edit</th>
                                    <th>Delete</th>--}}
                                </tr>
                                </thead>
                                @foreach($adminAll as $admin)
                                <tbody >
                                <tr>
                                    <td>{{$admin->name}}</td>
                                    <div>
                                        <td data-toggle="modal" data-target="#AdminModal" class="ourAdminData"><span style="color: black" class="glyphicon glyphicon-edit">  </span> {{$admin->email}}
                                            <input type="hidden" id="adminEmail" value="{{$admin->email}}">
                                            <input type="hidden" id="adminPhone" value="{{$admin->phone}}">
                                            <input type="hidden" id="adminName" value="{{$admin->name}}">
                                            <input type="hidden" id="adminId" value="{{$admin->id}}">
                                        </td>
                                    </div>
                                    <td>{{$admin->phone}}</td>

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


    <div id="AdminModal" class="modal fade" tabindex="-1" role="dialog">
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
                    <form class="form-horizontal" >
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                            </div>
                        </div>
                        <input type="hidden" id="id">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email :</label>
                            <div class="col-sm-10">
                                <input required type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input required type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">phone :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                            </div>
                        </div>
                    </form>

                     </div>
                <div class="modal-footer">
                    <button type="button" id="deleteButton" style="display: none" class="btn btn-warning" data-dismiss="modal">Delete</button>
                    <button type="button" id="SaveEditButton" style="display: none" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                    <button type="button" id="addButton" class="btn btn-primary">Add New Editor</button>
                    <button type="button" id="closeNow" class="btn btn-default" style="display: none" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{csrf_field()}}

    <script>
        $(document).ready(function () {
            $(document).on('click','.ourAdminData',function (event) {

                var text=$(this).text();
                var id=$(this).find('#adminId').val();
                var email=$(this).find('#adminEmail').val();
                var phone=$(this).find('#adminPhone').val();
                var name=$(this).find('#adminName').val();

                $('#titleButton').text('Edit Editor Data');
                var text=$.trim(text);
                $('#deleteButton').show('6000');
                $('#addcomment').show('9000');
                $('#password').hide('9000');
                $('#SaveEditButton').show('6000');
                $('#addButton').hide('6000');
                $('#email').val(text);
                $('#name').val(name);
                $('#phone').val(phone);
                $('#id').val(id);

                console.log(text);

            });

            $(document).on('click','#addAdminMainbutton',function (event) {
                $('#titleButton').text('Add new Editor');
                $('#deleteButton').hide('6000');
                $('#SaveEditButton').hide('6000');
                $('#addButton').show('6000');
                $('#password').show('6000');
                $('#name').val('');
                $('#password').val('');
                $('#email').val('');
                $('#phone').val('');
            });

            $('#addButton').click(function (event) {
                var name =$('#name').val();
                var email =$('#email').val();
                var phone =$('#phone').val();
                var password =$('#password').val();
                $('#name').show('9000');
                $('#email').show('9000');
                $('#phone').show('9000');
                $('#password').show('9000');
                $('#addButton').show('9000');

                $('#closeNow').show('9000');
                if(email=='' || password==''){
                    alert('please type email and password for create new admin');
                }else {
                    $('#titleButton').text('you added new Editor');
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#password').val('');
                    $('#addButton').show('9000');
                    $('#closeNow').show('9000');

                    $.post('/admin/add',{'name':name,'email':email,'phone':phone,'password':password,'_token':$('input[name=_token]').val()},function (data) {
                        console.log(data);

                        $('#adminTable').load(location.href +' #adminTable');
                        //$('#addcomment').show('9000');
                    });
                }


            });
            $('#deleteButton').click(function (event) {
                var id=$('#id').val();
                $.post('/admin/delete',{'id':id,'_token':$('input[name=_token]').val()},function (data) {
                    console.log(data);
                    //  $('#resposeDiv').load(location.href +' #resposeDiv');
                    $('#adminTable').load(location.href +' #adminTable');
                });

            });

            $('#SaveEditButton').click(function (event) {
                var id=$('#id').val();
                var name=$('#name').val();
                var email=$('#email').val();
                var phone=$('#phone').val();

                console.log(id);
                console.log(name);
                console.log(email);
                console.log(phone);

                $.post('/admin/update',{'id':id,'name':name,'email':email,'phone':phone,'_token':$('input[name=_token]').val()},function (data) {
                    console.log(data);
                    //  $('#resposeDiv').load(location.href +' #resposeDiv');
                    $('#adminTable').load(location.href +' #adminTable');
                });


            });

        });

    </script>
@endsection

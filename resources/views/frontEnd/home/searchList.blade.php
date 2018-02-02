@extends('frontEnd.master')
@section("Titel")
    Search List
@endsection()
@section("MainContent")
    <section id="main-content">
        <section class="wrapper">
            <div class="gallery">
                <h2 class="w3ls_head">Search list</h2>
                <div class="gallery-grids">
                    <div class="gallery-top-grids">

                        @foreach($usersall as $user)
                            <div class="col-sm-4 gallery-grids-left">
                                <div class="gallery-grid">
                                    <a  href="{{url('/profile/'.$user->id)}}">
                                        <img style="height: 250px;width: 320px" src="{{asset($user->proPic=='' ? 'frontEnd/images/avatar.png':$user->proPic)}}" alt=""/>
                                        <div class="captn">
                                            <h3 style="text-align: left;font-size: 16px;color: white"><span style="color: black">Name:</span>{{ $user->name }}</h3>
                                            <h3 style="text-align: left;font-size: 16px;color: white"><span style="color: black">Gender:</span>{{ $user->gender }}</h3>
                                            <h3 style="text-align: left;font-size: 16px;color: white"><span style="color: black">Email:</span>{{ $user->email }}</h3>
                                            <h3 style="text-align: left;font-size: 16px;color: white"><span style="color: black">Phone:</span>{{ $user->phone }}</h3>
                                            <h3 style="text-align: left;font-size: 16px;color: white"><span style="color: black">Date of Birth:</span>{{ $user->dateOfBirth }}</h3>
                                            <p></p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        @endforeach

                        <div class="clearfix"></div>
                    </div>


                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>


            </div>
        </section>

    </section>

    {{-- <script src="js/lightbox-plus-jquery.min.js"> </script>--}}
    <script src="{{asset('frontEnd/js/lightbox-plus-jquery.min.js')}}"></script>
@endsection()
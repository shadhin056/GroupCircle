@extends('frontEnd.master')
@section("Titel")
    Gallery
@endsection()
@section("MainContent")
    <section id="main-content">
        <section class="wrapper">
            <div class="gallery">
                <h2 class="w3ls_head">Gallery</h2>
                <div class="gallery-grids">
                    <div class="gallery-top-grids">

                        @foreach($imageDatas as $imageData)
                            @if($imageData->upload_photo=='')

                                @continue

                            @else
                            <div class="col-sm-4 gallery-grids-left">
                                <div class="gallery-grid">
                                    <a  class="example-image-link" href="{{asset($imageData->upload_photo)}}" data-lightbox="example-set"
                                        data-title="{{$imageData->status}}">
                                        <img src="{{asset($imageData->upload_photo)}}" alt=""/>
                                        <div class="captn">
                                            <h4>{{ $imageData->post_time }}</h4>
                                            <p></p>
                                        </div>
                                    </a>
                                </div>
                            </div>


                            @endif

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
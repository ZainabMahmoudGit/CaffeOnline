
 @extends('layouts.app')

@section('content')

<section class="about-section section-padding" id="section_2">
                    <div class="section-overlay"></div>
                    <div class="container">
                    @foreach ($about as $aboutdes)
                        <div class="row align-items-center">

                            <div class="col-lg-6 col-12">
                                <div class="ratio ratio-1x1">
                                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                                        <source src="{{ asset('videos/pexels-mike-jones-9046237.mp4') }}" type="video/mp4">
                                   </video>

                                    <div class="about-video-info d-flex flex-column">
                                        <h4 class="mt-auto">{{$aboutdes->VideoDescriptionLineOne}}</h4>

                                        <h4>{{$aboutdes->VideoDescriptionLineTwo}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-12 mt-4 mt-lg-0 mx-auto">
                                <em class="text-white">{{$aboutdes->Title}}</em>

                                <h2 class="text-white mb-3">{{$aboutdes->header}}</h2>

                                <p class="text-white">{{$aboutdes->AboutDescriptionOne}}</p>

                                <p class="text-white">{{$aboutdes->AboutDescriptionTwo}}</p>

                                <a href="#barista-team" class="smoothscroll btn custom-btn custom-border-btn mt-3 mb-4">Meet Baristas</a>
                            </div>

                        </div>

                        @endforeach

                    </div>
                </section>
           
                @endsection
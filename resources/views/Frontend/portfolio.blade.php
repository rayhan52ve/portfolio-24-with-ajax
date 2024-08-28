@extends('Frontend.partials.master')
@section('content')
<body class="portfolio">
    <!-- Live Style Switcher Starts - demo only -->
    @include('Frontend.partials._layouts.theme')
 
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Header Starts -->
    @include('Frontend.partials._layouts.header')
    <!-- Header Ends -->
    <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
        <h1>my <span>projects</span></h1>
        <span class="title-bg">works</span>
    </section>
    <!-- Page Title Ends -->
    <!-- Main Content Starts -->
    {{-- @php
       $sl=1 
    @endphp --}}
    <section class="main-content text-center revealator-slideup revealator-once revealator-delay1">
        <div id="grid-gallery"  class="container grid-gallery">
            
            <!-- Portfolio Grid Starts -->
            <section class="grid-wrap">
                
                <ul class="row grid">
                    <!-- Portfolio Item Starts -->
                    @if($portfolios->count()>0)
                    @foreach ($portfolios as $portfolio)
                        <li>
                            <figure>
                                <img src="{{asset($portfolio->image)}}" alt="Portolio Image" />
                                <div><span>{{$portfolio->title}}</span></div>
                            </figure>
                        </li>
                    @endforeach
                    @endif
                </ul>
            </section>
            <!-- Portfolio Grid Ends -->
            <!-- Portfolio Details Starts -->
            <section class="slideshow">
                <ul>
                    <!-- Portfolio Item Detail Starts -->
                    @if($portfolios->count()>0)
                    @foreach ($portfolios as $portfolio)
                    <li>
                        <figure>
                            <!-- Project Details Starts -->
                            <figcaption>
                                <h3>{{$portfolio->title}}</h3>
                                <div class="row open-sans-font">
                                    <div class="col-12 col-sm-6 mb-2">
                                        <i class="fa fa-file-text-o pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">{{$portfolio->title}}</span>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-2">
                                        <i class="fa fa-user-o pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">{{$portfolio->client}}</span>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-2">
                                        <i class="fa fa-code pr-2"></i><span class="project-label">Technologies </span>: <span class="ft-wt-600 uppercase">{{$portfolio->technology}}</span>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-2">
                                        <i class="fa fa-external-link pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="{{$portfolio->preview}}" target="_blank">{{$portfolio->preview}}</a></span>
                                    </div>
                                </div>
                            </figcaption>
                            <!-- Project Details Ends -->
                            <!-- Main Project Content Starts -->
                            <img src="{{asset($portfolio->image)}}" alt="Portolio Image" />
                            <!-- Main Project Content Ends -->
                        </figure>
                    </li>
                    @endforeach
                    @endif
                    <!-- Portfolio Item Detail Ends -->

                </ul>
                <!-- Portfolio Navigation Starts -->
                <nav>
                    <span class="icon nav-prev"><img src="{{asset('frontend/img/projects/navigation/left-arrow.png')}}" alt="previous"></span>
                    <span class="icon nav-next"><img src="{{asset('frontend/img/projects/navigation/right-arrow.png')}}" alt="next"></span>
                    <span class="nav-close"><img src="{{asset('frontend/img/projects/navigation/close-button.png')}}" alt="close"> </span>
                </nav>
                <!-- Portfolio Navigation Ends -->
            </section>

        </div>
    </section>

    <!-- Main Content Ends -->
    
    @include('Frontend.partials._layouts.script')
    
    </body>
@endsection

@extends('Frontend.partials.master')
@section('content')

    <body class="home">
        <style>
            .home .bg {
                background-image: url('{{ @$user->image ? asset($user->image) : asset('frontend/img/img-mobile.jpg') }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: top;
                height: calc(100vh - 80px);
                z-index: 111;
                border-radius: 30px;
                left: 40px;
                top: 40px;
                box-shadow: 0 0 7px rgba(0, 0, 0, .9);
            }
        </style>
        <!-- Live Style Switcher Starts - demo only -->
        @include('Frontend.partials._layouts.theme')

        <!-- Live Style Switcher Ends - demo only -->
        <!-- Header Starts -->
        @include('Frontend.partials._layouts.header')
        <!-- Header Ends -->
        <!-- Main Content Starts -->
        <section
            class="container-fluid main-container container-home p-0 revealator-slideup revealator-once revealator-delay1">
            <div class="color-block d-none d-lg-block"></div>
            <div class="row home-details-container align-items-center">
                <div class="col-lg-4 bg position-fixed d-none d-lg-block"></div>
                <div class="col-12 col-lg-8 offset-lg-4 home-details text-left text-sm-center text-lg-left">
                    <div>
                        <img src="img/img-mobile.jpg" class="img-fluid main-img-mobile d-none d-sm-block d-lg-none"
                            alt="my picture" />
                        <h1 class="text-uppercase poppins-font">I'm
                            {{ @$user->name }}.<span>{{ @$user->designation }}</span></h1>
                        <p class="open-sans-font">{{ @$user->description }}</p>
                        <a class="button" href="{{ route('about') }}">
                            <span class="button-text">more about me</span>
                            <span class="button-icon fa fa-arrow-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content Ends -->

        @include('Frontend.partials._layouts.script')

    </body>
@endsection

@extends('Frontend.partials.master')
@section('content')

    <body class="about">
        <!-- Live Style Switcher Starts - demo only -->
        @include('Frontend.partials._layouts.theme')

        <!-- Live Style Switcher Ends - demo only -->
        <!-- Header Starts -->
        @include('Frontend.partials._layouts.header')
        <!-- Header Ends -->
        <!-- Page Title Starts -->
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>ABOUT <span>ME</span></h1>
            <span class="title-bg">Resume</span>
        </section>
        <!-- Page Title Ends -->
        <!-- Main Content Starts -->
        <section class="main-content revealator-slideup revealator-once revealator-delay1">
            <div class="container">
                <div class="row">
                    <!-- Personal Info Starts -->
                    <div class="col-12 col-lg-5 col-xl-6">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-uppercase custom-title mb-0 ft-wt-600">personal infos</h3>
                            </div>
                            <div class="col-12 d-block d-sm-none">
                                <img src="{{ @$users->image ? asset($users->image) : asset('frontend/img/img-mobile.jpg') }}" class="img-fluid main-img-mobile"
                                    alt="my picture" />
                            </div>
                            <div class="col-6">
                                <ul class="about-list list-unstyled open-sans-font">
                                    <li> <span class="title">name :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->name : 'n/a' }}
                                        </span> </li>
                                    <li> <span class="title">Age :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->age : 'n/a' }}
                                            Years</span> </li>
                                    <li> <span class="title">Nationality :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->nationality : 'n/a' }}</span>
                                    </li>
                                    <li> <span class="title">Freelance :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->freelance : 'n/a' }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="about-list list-unstyled open-sans-font">
                                    <li> <span class="title">Address :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->address : 'n/a' }}</span>
                                    </li>
                                    <li> <span class="title">phone :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->phone : 'n/a' }}</span>
                                    </li>
                                    <li> <span class="title">Email :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->email : 'n/a' }}</span>
                                    </li>
                                    <li> <span class="title">LinkedIn :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block"><a
                                                target="__blanck" href="{{ @$users->linkedin ? $users->linkedin : '#' }}">{{ @$users->linkedin ? 'Sajid Rayhan' : 'n/a' }}</a></span>
                                    </li>
                                    <li> <span class="title">langages :</span> <span
                                            class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $users ? $users->languages : 'n/a' }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 mt-3">
                                <a class="button" href="{{ @$users->cv ? $users->cv : 'n/a' }}" target="_blanck">
                                    <span class="button-text">{{ @$users->cv ? 'Download CV' : 'No CV Uploaded Yet' }}</span>
                                    <span class="button-icon fa fa-download"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Info Ends -->
                    <!-- Boxes Starts -->
                    <div class="col-12 col-lg-7 col-xl-6 mt-5 mt-lg-0">
                        <div class="row">
                            <div class="col-6">
                                <div class="box-stats with-margin">
                                    <h3 class="poppins-font position-relative">{{ $users ? $users->experience : 0 }}</h3>
                                    <p class="open-sans-font m-0 position-relative text-uppercase">
                                            years of
                                        <span class="d-block">experience</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="box-stats with-margin">
                                    <h3 class="poppins-font position-relative">{{ $users ? $users->complete_project : 0 }}</h3>
                                    <p class="open-sans-font m-0 position-relative text-uppercase">completed <span
                                            class="d-block">projects</span></p>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                        <div class="box-stats">
                            <h3 class="poppins-font position-relative">81</h3>
                            <p class="open-sans-font m-0 position-relative text-uppercase">Happy<span class="d-block">customers</span></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="box-stats">
                            <h3 class="poppins-font position-relative">53</h3>
                            <p class="open-sans-font m-0 position-relative text-uppercase">awards <span class="d-block">won</span></p>
                        </div>
                    </div> --}}
                        </div>
                    </div>
                    <!-- Boxes Ends -->
                </div>
                <hr class="separator">
                <!-- Skills Starts -->
                @if ($skills->count() >0)
                    <div class="row">
                        <div class="col-12">
                            <h3
                                class="text-uppercase pb-4 pb-sm-5 mb-3 mb-sm-0 text-left text-sm-center custom-title ft-wt-600">
                                My Skills</h3>
                        </div>
                        @foreach ($skills as $skill)
                            <div class="col-6 col-md-3 mb-3 mb-sm-5">
                                <div class="c100 p{{ $skill->percentage }}">
                                    <span>{{ $skill->percentage }}%</span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div>
                                <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">{{ $skill->program }}
                                </h6>
                            </div>
                        @endforeach
                    </div>
                @endif
                <!-- Skills Ends -->
                <hr class="separator mt-1">
                <!-- Experience & Education Starts -->
                @if ($experiences->count() > 0 || $educations->count() > 0)
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-uppercase pb-5 mb-0 text-left text-sm-center custom-title ft-wt-600">Experience
                                <span>&</span> Education
                            </h3>
                        </div>
                        <div class="col-lg-6 m-15px-tb">
                            <div class="resume-box">
                                <ul>
                                    @foreach ($experiences as $experience)
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <span class="time open-sans-font text-uppercase">{{ $experience->time }}
                                            </span>
                                            <h5 class="poppins-font text-uppercase">{{ $experience->title }} <span
                                                    class="place open-sans-font">{{ $experience->sector }}</span></h5>
                                            <p class="open-sans-font">{{ $experience->description }} </p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 m-15px-tb">
                            <div class="resume-box">
                                <ul>
                                    @foreach ($educations as $education)
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-graduation-cap"></i>
                                            </div>
                                            <span class="time open-sans-font text-uppercase">{{ $education->time }}</span>
                                            <h5 class="poppins-font text-uppercase">{{ $education->title }}<span
                                                    class="place open-sans-font">{{ $education->sector }}</span></h5>
                                            <p class="open-sans-font">{{ $education->description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Experience & Education Ends -->
            </div>
        </section>
        <!-- Main Content Ends -->

        @include('Frontend.partials._layouts.script')

    </body>
@endsection

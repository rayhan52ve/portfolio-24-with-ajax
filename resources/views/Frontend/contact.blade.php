@extends('Frontend.partials.master')
@section('content')

    <body class="contact">
        <!-- Live Style Switcher Starts - demo only -->
        @include('Frontend.partials._layouts.theme')

        <!-- Live Style Switcher Ends - demo only -->
        <!-- Header Starts -->
        @include('Frontend.partials._layouts.header')
        <!-- Header Ends -->
        <!-- Main Content Starts -->
        <!-- Page Title Starts -->
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>get in <span>touch</span></h1>
            <span class="title-bg">contact</span>
        </section>
        <!-- Page Title Ends -->
        <!-- Main Content Starts -->
        <section class="main-content revealator-slideup revealator-once revealator-delay1">
            <div class="container">
                <div class="row">
                    <!-- Left Side Starts -->
                    <div class="col-12 col-lg-4">
                        <h3 class="text-uppercase custom-title mb-0 ft-wt-600 pb-3">My Contacts</h3>
                        <p class="open-sans-font mb-3">Feel free to get in touch with me. I am always open to discussing new
                            projects, creative ideas or opportunities to be part of your visions.</p>
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fa fa-envelope-open position-absolute"></i>
                            <span class="d-block">mail me</span>{{ @$user->email }}
                        </p>
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fa fa-phone-square position-absolute"></i>
                            <span class="d-block">call me</span>{{ @$user->phone }}
                        </p>
                        <ul class="social list-unstyled pt-1 mb-5">
                            <li class="facebook"><a title="Facebook" href="https://www.facebook.com/"><i
                                        class="fa fa-facebook"></i></a>
                            </li>
                            <li class="twitter"><a title="Twitter" href="https://twitter.com/"><i
                                        class="fa fa-twitter"></i></a>
                            </li>
                            <li class="youtube"><a title="Youtube" href="https://www.youtube.com/"><i
                                        class="fa fa-youtube"></i></a>
                            </li>
                            <li class="dribbble"><a title="Dribbble" href="https://dribbble.com/"><i
                                        class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Left Side Ends -->
                    <!-- Contact Form Starts -->
                    <div class="col-12 col-lg-8">
                        <form class="contactform" method="post" action="{{ route('contactUS') }}">
                            @csrf
                            <div class="contactform">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <input type="text" name="name" placeholder="YOUR NAME">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="email" name="email" placeholder="YOUR EMAIL">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="text" name="subject" placeholder="YOUR SUBJECT">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" placeholder="YOUR MESSAGE"></textarea>
                                        <button type="submit" class="button">
                                            <span class="button-text">Send Message</span>
                                            <span class="button-icon fa fa-send"></span>
                                        </button>
                                    </div>
                                    <div class="col-12 form-message">
                                        <span class="output_message text-center font-weight-600 text-uppercase"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form Ends -->
                </div>
            </div>

        </section>
        <!-- Main Content Ends -->

        @include('Frontend.partials._layouts.script')

    </body>
@endsection

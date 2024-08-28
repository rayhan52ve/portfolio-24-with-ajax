@php
    $html_tag_data = [];
    $title = 'Forget Password';
    $description= 'Forget for Admin';
@endphp
@extends('Admin.partials.login',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])


@section('login')

<div id="root" class="h-100">
    <!-- Background Start -->
    <div class="fixed-background"></div>
    <!-- Background End -->

    <div class="container-fluid p-0 h-100 position-relative">
      <div class="row g-0 h-100">
        <!-- Left Side Start -->
        <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
          <div class="min-h-100 d-flex align-items-center">
            <div class="w-100 w-lg-75 w-xxl-50">
              <div>
                <div class="mb-5">
                  <h1 class="display-3 text-white">Multiple Niches</h1>
                  <h1 class="display-3 text-white">Ready for Your Project</h1>
                </div>
                <p class="h6 text-white lh-1-5 mb-5">
                  Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before
                  process-centric communities...
                </p>
                <div class="mb-5">
                  <a class="btn btn-lg btn-outline-white" href="index.html">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Left Side End -->

        <!-- Right Side Start -->
        <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
          <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
            <div class="sw-lg-50 px-5">
              <div class="sh-11">
                <a href="index.html">
                  <div class="logo-default"></div>
                </a>
              </div>
              <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">Password is gone?</h2>
                <h2 class="cta-1 text-primary">Let's reset it!</h2>
              </div>
              <div class="mb-5">
                <p class="h6">Please enter your email to receive a link to reset your password.</p>
                <p class="h6">
                  If you are a member, please
                  <a href="Pages.Authentication.Login.html">login</a>
                  .
                </p>
              </div>
              <div>
                <form method="POST" action="{{route('ForgetPasswordPost')}}">
                  @csrf
                  <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="email"></i>
                    <input type="email" class="form-control @error('email') is-valid @enderror" name="email" placeholder="Email Address" value="" autofocus />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  @if(session()->get('error'))
                  <div class="text-danger">{{session()->get('error')}}</div>
                  @endif</div>
                  <button type="submit" class="btn btn-lg btn-primary">Send Reset Email</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Right Side End -->
      </div>
    </div>
  </div>

@endsection
@php
    $html_tag_data = [];
    $title = 'Login';
    $description= 'Login for Admin';
@endphp
@extends('Admin.partials.login',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('login')
<div class=" offset-3 col-md-6 col-lg-auto h-100 pb-4 px-4 pt-1 p-lg-5">
  <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
    <div class="sw-lg-50 px-5">
      <div class="sh-11">
        <a href="{{route('login')}}">
<img src=""/>        </a>
      </div>

      <div>
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        
          @if(Session::has('message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        <form id="loginForm" class="tooltip-end-bottom" autocomplete="off" action="{{route('login')}}" method="post">
          {{-- <form id="loginForm" class="tooltip-end-bottom" autocomplete="off"> --}}
          @csrf 
          <div class="mb-3 filled form-group tooltip-end-top">
            <i data-acorn-icon="email"></i>
            <input class="form-control" type="email" placeholder="Email" name="email" id="email" />
          </div>
          <div class="mb-3 filled form-group tooltip-end-top">
            <i data-acorn-icon="lock-off"></i>
            <input class="form-control pe-7" name="password" id="password" type="password" placeholder="Password" />
            <a class="text-small position-absolute t-3 e-3" href="{{route('ForgetPassword')}}">Forgot?</a>
          </div>
          <button type="submit" id="login_btn" class="btn btn-lg btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js_page')
{{-- <script src="{{asset('backend/Admin/custom_js/login.js')}}"></script> --}}
@endsection


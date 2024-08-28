<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
@isset($html_tag_data)
    @foreach ($html_tag_data as $key=> $value)
    data-{{$key}}='{{$value}}'
    @endforeach
@endisset 
>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Handyman </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('Admin.partials._layouts.head')
 
  </head>

  <body class="h-100">
    <div id="root" class="h-100">
      <!-- Background Start -->
      <div class="fixed-background"></div>
      <!-- Background End -->

      <div class="container-fluid p-0 h-100 position-relative">
        <div class="row g-0 h-100">
          <!-- Left Side Start -->

          <!-- Left Side End -->

          <!-- Right Side Start -->
         @yield('login')
          <!-- Right Side End -->
        </div>
      </div>
    </div>

   
@include('Admin.partials._layouts.script')
    @yield('js_page')
    </body>
    
    </html>
@php
    $webInfo = \App\Models\WebInfo::first();
    @$color = $webInfo->front_color;
@endphp
<!-- Template Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700" rel="stylesheet">

<!-- Template CSS Files -->
<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/preloader.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/circle.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/fm.revealator.jquery.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

<!-- CSS Skin File -->
@if ($color == 'yellow')
    <link href="{{ asset('frontend/css/skins/yellow.css') }}" rel="stylesheet">
@elseif ($color == 'blue')
    <link href="{{ asset('frontend/css/skins/blue.css') }}" rel="stylesheet">
@elseif ($color == 'green')
    <link href="{{ asset('frontend/css/skins/green.css') }}" rel="stylesheet">
@elseif ($color == 'blueviolet')
    <link href="{{ asset('frontend/css/skins/blueviolet.css') }}" rel="stylesheet">
@elseif ($color == 'goldenrod')
    <link href="{{ asset('frontend/css/skins/goldenrod.css') }}" rel="stylesheet">
@elseif ($color == 'magenta')
    <link href="{{ asset('frontend/css/skins/magenta.css') }}" rel="stylesheet">
@elseif ($color == 'orange')
    <link href="{{ asset('frontend/css/skins/orange.css') }}" rel="stylesheet">
@elseif ($color == 'purple')
    <link href="{{ asset('frontend/css/skins/purple.css') }}" rel="stylesheet">
@elseif ($color == 'red')
    <link href="{{ asset('frontend/css/skins/red.css') }}" rel="stylesheet">
@elseif ($color == 'yellowgreen')
    <link href="{{ asset('frontend/css/skins/yellowgreen.css') }}" rel="stylesheet">
@else
    <link href="{{ asset('frontend/css/skins/yellowgreen.css') }}" rel="stylesheet">
@endif

<!-- Live Style Switcher - demo only -->
<link rel="alternate stylesheet" type="text/css" title="blue" href="{{ asset('frontend/css/skins/blue.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="green" href="{{ asset('frontend/css/skins/green.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="yellow" href="{{ asset('frontend/css/skins/yellow.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="blueviolet"
    href="{{ asset('frontend/css/skins/blueviolet.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="goldenrod"
    href="{{ asset('frontend/css/skins/goldenrod.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="magenta"
    href="{{ asset('frontend/css/skins/magenta.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="orange" href="{{ asset('frontend/css/skins/orange.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="purple" href="{{ asset('frontend/css/skins/purple.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="red" href="{{ asset('frontend/css/skins/red.css') }}" />
<link rel="alternate stylesheet" type="text/css" title="yellowgreen"
    href="{{ asset('frontend/css/skins/yellowgreen.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/styleswitcher.css') }}" />
@yield('css')
<!-- Modernizr JS File -->
<script src="{{ asset('frontend/js/modernizr.custom.js') }}"></script>
<link rel="icon" type="image/png" href="{{ asset('frontend/img/favicon/sr3.jpg') }}" sizes="196x196" />

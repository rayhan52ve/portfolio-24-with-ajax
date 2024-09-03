<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Portfolio-24 | Dashboard </title>
    <meta name="description" content="" />
    @include('Admin.partials._layouts.head')

</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex"
            @isset($custom_nav_data) @foreach ($custom_nav_data as $key => $value)
    data-{{ $key }}="{{ $value }}"
        @endforeach
        @endisset>
            @include('Admin.partials._layouts.nav')

        </div>
        <main @isset($custom_main_class)
        class="{{ $custom_main_class }}"
        @endisset>
            @yield('content')
        </main>
        @include('Admin.partials._layouts.footer')
    </div>
    @include('Admin.partials._layouts.modal_settings')
    @include('Admin.partials._layouts.modal_search')
    @include('Admin.partials._layouts.script')

</body>

</html>

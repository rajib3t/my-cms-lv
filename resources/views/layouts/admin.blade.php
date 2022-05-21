<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>



    {{-- Fonts --}}
    {{ Html::style('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',['media'=>false]) }}
    {{-- Nucleo Icons --}}
    {{ Html::style('admin-design/assets/css/nucleo-icons.css',['media'=>false]) }}
    {{ Html::style('admin-design/assets/css/nucleo-svg.css',['media'=>false]) }}
    {{-- Font Aswome --}}
    {{ Html::script('https://kit.fontawesome.com/42d5adcbca.js',['crossorigin'=>'anonymous']) }}
    {{-- CSS Style --}}
    {{ Html::style('admin-design/assets/css/soft-ui-dashboard.css',['media'=>false,'ver'=>'1.0']) }}
    {{-- Page Specific CSS --}}
    @stack('css')
    @php
        $route = Route::currentRouteName()
    @endphp

    @switch($route)
        @case('admin.login')
                @php($class = '')
            @break
        @default
                @php($class = 'g-sidenav-show  bg-gray-100')
    @endswitch
</head>
<body class="{{ $class }}">

    @switch($route)
        @case('admin.login')
                {{ $slot }}
            @break
        @case('admin.forget.password')
                {{ $slot }}
            @break
        @case('admin.password.reset')
            {{ $slot }}
            @break
        @default
            @include('elements.admin.sidebar')
                <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                    @include('elements.admin.topbar')
                    <div class="container-fluid py-4">
                            @include('elements.admin.cards')
                            {{ $slot }}

                        {{-- @include('elements.admin.footer') --}}
                    </div>
                </main>
    @endswitch

    {{-- Code JS --}}
    {{ Html::script('admin-design/assets/js/core/popper.min.js') }}
    {{ Html::script('admin-design/assets/js/core/bootstrap.min.js') }}
    {{ Html::script('admin-design/assets/js/plugins/perfect-scrollbar.min.js') }}
    {{ Html::script('admin-design/assets/js/plugins/smooth-scrollbar.min.js') }}
    {{-- Page Specific JS --}}
    @stack('js')
</body>
</html>
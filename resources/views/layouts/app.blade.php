<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titleP')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">

    @php
         $setting=App\Models\Setting::find(1);   
    @endphp
    @if ($setting)
        
    <link rel="shortcut icon" href="{{asset('uploads/settings/'.$setting->favicon)}}" type="image/x-icon">
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <!-- css files link -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <!-- Scripts for bootstrap-->
    @vite([ 'resources/js/app.js'])
</head>
<body class="bg-biscuit">
    <div id="app">
        @include('layouts.inc.frontend-navbar')

        <main class="">
            @yield('content')
        </main>


        @include('layouts.inc.frontend-footer')
    </div>

    <script src="{{asset('assets/js/jquery-3.6.1.min.js')}} "></script>
    @yield('scripts')

    
</body>
</html>

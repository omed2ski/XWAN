<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
   
    <link rel="stylesheet" href="{{asset('assets/css/dash.css')}}">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- summernote css link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- data Table css link --}}
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">


    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0 !important;
            margin: 0 !important;
        }

        div.dataTables_wrapper div.dataTables_length select{
            width: 50% !important;
        }
    </style>

    <!-- Scripts -->
    @vite([ 'resources/js/app.js'])
</head>
<body>
    <div class="d-flex" id="wrapper">
        @include('layouts.inc.admin-sidebar')

        <div id="page-content-wrapper">
            @include('layouts.inc.admin-navbar')
            <div class="container-fluid px-4">
                @yield('contents')
            </div>
        </div>





    </div>

    <script src="{{asset('assets/js/dashScripts.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.6.1.min.js')}}"></script> <!-- jquery link -->
    
    {{-- summernote js link --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  

    
    <script>
        $(document).ready(function() {
            $(".mySummernote").summernote();
            $('.dropdown-toggle').dropdown();
        });

      
        </script>
        {{-- data table js link --}}
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   


        
        <script src="{{asset('assets/js/dataTables.bootstrap5.min.js')}}"></script>
        <script>
            $(document).ready( function () {
                $('#myDataTable').DataTable();
             } );
        </script>
    @yield('scripts')
</body>
</html>
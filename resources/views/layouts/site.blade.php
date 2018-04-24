<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title','Photobook/Frames')</title> 
        @include('includes.links')
 
    </head>
    <body> 
        
        <!-- Start Header -->
        @include('includes.header')
        <!-- End Header -->
        
        @yield('content')
        
        <!-- Scripts -->
        @include('includes.scripts')
        @yield('scripts')
    </body>
</html>
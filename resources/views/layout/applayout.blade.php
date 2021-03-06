<!DOCTYPE html>
<html>
<head>
@yield('title')
    @include('includes.head')
@yield('meta')
    @yield('meta-json')
@yield('css')
</head>
<body>
<header>@include('includes.header')</header>
<div class="container">
        @include('includes.messages')
    @yield('content')
</div>
@yield('script')
<footer> @include('includes.footer')</footer>
</body>
</html>
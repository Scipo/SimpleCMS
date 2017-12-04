<!DOCTYPE html>
<html>
<head>
        @yield('title')
        @include('includes.head')
        @yield('meta')

</head>
<body>
<header>   @include('includes.header')</header>
<div class="container">
        @include('includes.messages')
    @yield('content')
</div>
@yield('script')
<footer> @include('includes.footer')</footer>
</body>
</html>
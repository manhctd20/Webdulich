<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Tour - @yield('title')</title>
    @include('frontend.includes.style')
</head>
<body>
@include('frontend.includes.header')

@yield('body')


@include('frontend.includes.footer')

@include('frontend.includes.script')
@include('sweetalert::alert')
</body>

</html>

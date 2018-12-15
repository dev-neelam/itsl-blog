<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href={{ URL::to("css/semantic/dist/semantic.min.css")}}>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/front.css') }}">
    <link rel="stylesheet" type="text/css" href={{ URL::to("css/summernote/dist/summernote-lite.css")}}>
    @yield('styles')

    <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src={{ URL::to("css/semantic/dist/semantic.js")}}></script>
    <script type="text/javascript" src={{ URL::to("js/jquery.dotdotdot.min.js")}}></script>
    <script type="text/javascript" src={{ URL::to("css/summernote/dist/summernote-lite.js")}}></script>
    <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js" xmlns="http://www.w3.org/1999/html"></script>
    <script type="text/javascript">stLight.options({publisher: "fb5cd419-b425-415e-a9cf-7c86ed940b67", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
@include('vendor.itsl.partials.header')
@yield('content')

@yield('scripts')
</body>
</html>

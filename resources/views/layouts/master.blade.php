<!DOCTYPE html>
<html>
    <head>
        <title>Tech'IT easy - @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        {!! Html::style('assets/css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/app.css') !!}
    </head>
    <body>
        @include('partials.header')

        <div class="container">
            @yield('content')
        </div>

        @include('partials.footer')
        
        {!! Html::script('assets/js/jquery-2.1.4.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}
    </body>
</html>

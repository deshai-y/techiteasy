<!DOCTYPE html>
<html>
    <head>
        <title>Tech'IT easy - @yield('title')</title>
        {!! Html::style('assets/css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/font-awesome.min.css') !!}
        {!! Html::style('assets/css/app.css') !!}
    </head>
    <body>
        @include('partials.header')

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    @include('partials.sidebar')
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div class="admin-content">
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
        
        {!! Html::script('assets/js/jquery-2.1.4.min.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}
    </body>
</html>

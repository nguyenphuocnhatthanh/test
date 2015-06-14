<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('css/jquery-ui.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
    <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>

</head>
<body>
    <div class="container">
        @include('partials.nav')
        @if(Session::has('flash_message'))
            <p>{{Session::get('flash_message')}}</p>
        @endif
        @if(Session::has('flash_notification.message'))
            @include('partials.flash')
        @endif


        @yield('content')
    </div>

    {!! HTML::script('js/jquery-ui.js') !!}
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
    <div class="footer">
        @yield('footer')
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
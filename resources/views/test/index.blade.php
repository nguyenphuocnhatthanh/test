<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
    {{Auth::user()->getAuthIdentifier()}}
    {!!Form::open(['route' => 'midd'])!!}

    @if(Session::has('message'))
        <p>{{Session::get('message')}}</p>
    @endif

    <input type="text" name="number"/>
    <button type="submit">Subimt</button>
    {!!Form::close()!!}
    {!!HTML::link('auth/logout', 'Log out')!!}
</body>
</html>
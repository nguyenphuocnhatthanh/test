@extends('layout')

@section('content')
    {!! Form::open(['method' => 'GET', 'class' => 'navbar-form navbar-left']) !!}

        {{--@if(isset($hiddenPaginatorInputFields))
            {!! $hiddenPaginatorInputFields !!}
        @endif--}}
        <div class="form-group">
            <input type="text" id="search" name="search" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    {!! Form::close() !!}


{{--    {!!$users->render()!!}--}}
    @include('users.pagination', ['users' => $users, 'col' => 12])
    <script>
        $(document).ready(function() {
            var myArray = new Array();
            $.getJSON('users/find', function(data) {
                $(data).each(function(key, value) {
                    myArray.push(value.username);
                });
            });
            $('#search').autocomplete({
               source: myArray
            });

        });


    </script>
    <script>
        var ajax = false;
        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
          //  var search = $(this).attr('href').split('search=')[1].split('&')[0];
            var temp = $(this).attr('href').split('?')[1];
          //  alert($(this).attr('href').split('?')[1]);
            if(ajax == true) {
                alert('dang load');
                return false;
            }
            ajax = true;
            $.ajax({
                url : 'users?'+temp,
                dataType: 'json',

            }).done(function(data){
                $('#users').html(data);
                if(temp != window.location) {
                    window.history.pushState({path: temp}, '', "users?"+temp);
                }
               // window.location.hash =  temp;
            }).always(function() {
                ajax = false;
            });
            return false;
        });
        window.onpopstate = function (e) {
            window.location.reload(true);
        };
    </script>
@stop


{!! Form::open(['method' => 'GET', 'class' => 'navbar-form navbar-left']) !!}

{{--@if(isset($hiddenPaginatorInputFields))
    {!! $hiddenPaginatorInputFields !!}
@endif--}}
<div class="form-group">
    <input type="text" id="search" name="search" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
{!! Form::close() !!}

<script>
    $(document).ready(function() {
        var myArray = new Array();
        $.getJSON('users/find', function(data) {
            $(data).each(function(key, value) {
               myArray.push(value.username);
            });
            $('#search').autocomplete({
                source: myArray
            });
        });
    });
</script>
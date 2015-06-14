@extends('layout')

@section('content')
    <h1>Article</h1>
    <hr/>
    @if($articles)
        {!! Form::open(['method' => 'POST', 'route' => 'article.delete' , 'id' => 'form-delete-article']) !!}

        @foreach($articles as $article)
            <div id="article{{$article->id}}">
                <h2>{!!HTML::link('article/'.$article->id,$article->title)!!}</h2>
                <p>{{$article->body}}</p>
                {!!link_to_route('article.delete', 'Delete' , ['id' => $article->id], ['class' => 'delete', 'id' => $article->id, 'data-token' => csrf_token()])!!}
                <button type="submit" class="confirm-btn" id="{{$article->id}}" data-token="{{ csrf_token() }}">Confirm</button>
            </div>
        @endforeach

        {!! Form::close() !!}
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            var checkAjax = false;

            $(document).on('click', 'button.confirm-btn' ,function(event) {
                event.preventDefault();
                var id = $(this).attr('id');

                var token = $('input[name=_token]').val();
                if(checkAjax == true) {
                    return;
                }
                var answer = confirm('Ban co chac chan muon xoa ?');
                if(!answer) return;

                $.ajax({
                    url : $('#form-delete-article').attr('action'),
                    type : 'POST',
                    data : {_token : token, id : id},
                    success: function(data) {
                        checkAjax = true;
                        $.each(data, function(key, value){
                            if(value == 'success') {
                                $('#article'+id).remove();
                            }
                        })

                    }
                }).always(function() {
                    checkAjax = false;
                });

            });
        });
    </script>
@stop



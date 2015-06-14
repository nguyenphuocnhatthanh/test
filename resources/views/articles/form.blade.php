<!-- title Form Input  -->
{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class' => 'form-control']) !!}
<!-- body Form Input  -->
{!! Form::label('body', 'Body:') !!}
{!! Form::text('body', null, ['class' => 'form-control']) !!}
<!-- Published_at form Input -->
<div class="form-group">
    {!!Form::label('Published_at', 'Published_at:')!!}
    {!!Form::input('date', 'Published_at', date('Y-m-d'), ['class' => 'form-control'])!!}
</div>

<!-- tags Form Input  -->
{!! Form::label('tags_list', 'Tags:') !!}
{!! Form::select('tags_list[]', $tags, null,['id' => 'tags_list', 'class' => 'form-control', 'multiple']) !!}

{!! Form::button($buttonText, ['type' => 'submit']) !!}
@section('footer')
    <script>
        alert('abcd');
        $('#tags_list').select2();
    </script>
@endsection
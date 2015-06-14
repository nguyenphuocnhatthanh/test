@extends('layout.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
				<!-- Modal -->

		</div>
	</div>
</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => 'cropImage' , 'onSubmit' => 'return checkCoords();']) !!}
						{!!HTML::image('img/'.$data['link'], null, ['id' => 'crop'])!!}
						{!! Form::hidden('x', null, ['id' => 'x']) !!}
						{!! Form::hidden('y', null, ['id' => 'y']) !!}
						{!! Form::hidden('w', null, ['id' => 'w']) !!}
						{!! Form::hidden('h', null, ['id' => 'h']) !!}
						<button type="submit" class="btn btn-primary">Save changes</button>
					{!! Form::close() !!}
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>
	<div>
		{!! Form::open(['route' => 'home.image', 'files' => true]) !!}
		@if(Session::has('img'))
			{!!HTML::image('img/'.$data['link'], null)!!}
		@endif
			{!!Form::hidden('img_bckp', $data['link'])!!}
			{!!Form::input('file', 'image')!!}
			{!! Form::button('Send Image', ['type' => 'submit']) !!}
		{!! Form::close() !!}
		{!! Form::hidden('modal',$data['modal'] ,['id' => 'modal']) !!}
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/js/bootstrap-modal.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/js/jquery.Jcrop.min.js"></script>
<script>
	var modal;
	if($('#modal').val() == 'true') {
		modal = true;
	}else {
		modal = false;
	}
	$('document').ready(function() {
		$('#crop').Jcrop({
			onSelect: function(c) {
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			}
		});
	});

	$('#myModal').modal({show: modal});


	function checkCoords() {
		if(parseInt($('#w').val())) return true;
		alert('No selecttion');
		return false;
	}
</script>
@endsection

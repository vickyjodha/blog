@extends('layouts.app')
@section('content')

<div class="card card-default">
	
	<div class="card-header">
		Update Tag
	</div>
	<div class="card-body">
		<form action="{{route('tag.update',$tages->id)}}"  method="POST">
            {{csrf_field() }}
            @method('PUT')
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" value="{{$tages->name}}" name="name" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<button class="btn btn-success">Update Tag</button>
			</div>
		</form>
	</div>

</div>


@endsection
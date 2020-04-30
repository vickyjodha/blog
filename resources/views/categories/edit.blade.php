@extends('layouts.app')
@section('content')

<div class="card card-default">
	
	<div class="card-header">
		Update Categories
	</div>
	<div class="card-body">
		<form action="{{route('categories.update',$categories->id)}}"  method="POST">
            {{csrf_field() }}
            @method('PUT')
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" value="{{$categories->name}}" name="name" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<button class="btn btn-success">Update Categorie</button>
			</div>
		</form>
	</div>

</div>


@endsection
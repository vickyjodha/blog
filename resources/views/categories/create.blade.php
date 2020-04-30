@extends('layouts.app')
@section('content')

<div class="card card-default">
	
	<div class="card-header">
		Create Categories
	</div>
	<div class="card-body">
		<form action="{{route('categories.store')}}"  method="POST">
            @csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<button class="btn btn-success">Add Categorie</button>
			</div>
		</form>
	</div>

</div>


@endsection
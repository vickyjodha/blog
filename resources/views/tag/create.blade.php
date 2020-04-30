@extends('layouts.app')
@section('content')

<div class="card card-default">
	
	<div class="card-header">
		{{isset($tages)?'Update Tag':'Create Tag'}}
		
	</div>
	<div class="card-body">
		<form action="{{isset($tages)?route('tag.update',$tages->id):route('tag.store')}}"  method="POST">
            @csrf
			@if(isset($tages))
			@method('put')
			@endif
			<div class="form-group">
				<label for="tag">Tage</label>
				
				<input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{isset($tages)?$tages->name:''}}">
			</div>
			<div class="form-group">
				<button class="btn btn-success">{{isset($tages)?'Update Tag':'Add Tag'}}
				</button>
			</div>
		</form>
	</div>

</div>


@endsection
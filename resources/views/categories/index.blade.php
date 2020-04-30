@extends('layouts.app')
@section('title')
  CMS:Categories
@endsection
@section('content')

<div class="d-flex justify-content-end">
<a href="{{route('categories.create')}}" class="btn btn-success mb-2"> Add Categories</a>
</div>
<div class="card card-default">
	<div class="card-header">
		Categories
	</div>
	<div class="card-body">
		@if($categories->count()>0)
		<table class="table">
			<thead>
				<tr>
				   <th>Id</th>
				   <th>Name</th>
				   <th>Count</th>
				   <th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $categorie)
				<tr>
					<th>{{$categorie->id}}</th>
					<td>{{$categorie->name}}</td>
					<td>{{$categorie->posts->count()}}</td>
					<td>
						<a href="{{route('categories.edit', $categorie->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <form method="POST" id="delete-form-{{$categorie->id}}" action="{{route('categories.destroy',$categorie->id)}}" style="display: none">
  {{csrf_field()}}
  {{method_field('delete')}}
</form>
<button onclick="if (confirm('Are you Sure to delete this Categoriey {{$categorie->name}}?')){
  event.preventDefault();
  document.getElementById('delete-form-{{$categorie->id}}').submit();
}
else{event.preventDefault();
}"class="btn btn-danger btn-sm">Delete</button>
@endforeach
			</tbody>
		</table>
		@else
               <h1 style="text-align: center"> No Categories</h1>
        @endif	
	</div>
</div>


@endsection
@section('secripts')


@endsection
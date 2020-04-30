@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-end">
<a href="{{route('tag.create')}}" class="btn btn-success mb-2"> Add Tag</a>
</div>
<div class="card card-default">
	<div class="card-header">
	Tag
	</div>
	<div class="card-body">
		@if($tages->count()>0)
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
				@foreach($tages as $tage)
				<tr>
					<th>{{$tage->id}}</th>
					<td>{{$tage->name}}</td>
					<td>{{$tage->posts->count()}}</td>
					<td>
						<a href="{{route('tag.edit', $tage->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <form method="POST" id="delete-form-{{$tage->id}}" action="{{route('tag.destroy',$tage->id)}}" style="display: none">
  {{csrf_field()}}
  {{method_field('delete')}}
</form>
<button onclick="if (confirm('Are you Sure to delete this tagey {{$tage->name}}?')){
  event.preventDefault();
  document.getElementById('delete-form-{{$tage->id}}').submit();
}
else{event.preventDefault();
}"class="btn btn-danger btn-sm">Delete</button>
</td>
</tr>
@endforeach
			</tbody>
		</table>
		@else
               <h1 style="text-align: center"> No tages</h1>
        @endif	
	</div>
</div>


@endsection
@section('secripts')


@endsection
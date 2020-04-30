@extends('layouts.app')
@section('title')
  CMS:User
@endsection
@section('content')


<div class="card card-default">
	<div class="card-header">
	Users
</div>
	<div class="card-body">
		@if($users->count()>0)
		<table class="table responsive">
			<thead>
				<tr>
                   <th>Image</th>
					<th>Name</th>
					
					<th>Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				@foreach($users as $user)
				<tr>
                <td><img width="50px" height="50px" style="border-radius: 50%;" src="{{Gravatar::src($user->email)}}" alt=""> </td>
					<td>{{$user->name}}</td>
					
					<td>{{$user->email}}</td>
					<td>					
                    @if(!$user->Isadmian())
                    <form class="d-inline" action="{{route('user.makeadmin',$user->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn-info btn btn-sm">Make Admin</button>
                    </form>
                    
                    @endif
               </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		   
			<h1 style="text-align: center"> No Users</h1>
		
	
		@endif
	</div>
	
</div>


@endsection
@section('secripts')


@endsection
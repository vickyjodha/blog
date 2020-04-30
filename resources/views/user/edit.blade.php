@extends('layouts.app')

@section('content')
<div class="card card-default">
<div class="card-header">Update Profile</div>
<div class="card-body">
<form action="{{route('user.update',$user->id)}}" method="POST">
              @csrf
              @method('put')
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="name">
			</div>
            <div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="email">
			</div>
            <div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Update</button>
			</div>
</form></div>
</div>




@endsection

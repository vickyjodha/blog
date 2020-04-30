@extends('layouts.app')
@section('title')
  CMS:Create Post
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('content')

<div class="card card-default">
	
	<div class="card-header">
		Update Post
	</div>
	<div class="card-body">
		<form action="{{route('post.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" id="title" name="title"  class="form-control" placeholder="title">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea  id="description" rows="5" cols="5" name="description" placeholder="Description" class="form-control">{{$posts->description}}</textarea>
				
			</div>
			<div class="form-group">
				<label for="content">Content</label>
					 <input id="content" type="hidden" value="{{$posts->content}}"  name="content">
                  <trix-editor  input="content"></trix-editor>
				
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<img src="{{asset('public/storage')}}{{$posts->image'}}" height="60px" width="60px">
				<input type="file" id="image" name="image" value="{{$posts->image}}" class="form-control" placeholder="Image">
			</div>
			<div class="form-group">
				<label for="time">Published_at</label>

				<input type="text" id="published_at" name="published_at" value="{{$posts->published_at}}" class="form-control" placeholder="published_at">
			</div>
			<div class="form-group">
				<button class="btn btn-success">Add Post</button>
			</div>
		</form>
	</div>

</div>


@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
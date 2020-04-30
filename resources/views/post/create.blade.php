@extends('layouts.app')
@section('title')
  CMS:{{isset($posts)?'Update Post':'Create Post'}}
@endsection
@section('css')
<link href="{{asset('public/css/select2.min.css')}}" rel="stylesheet">	
<link rel="stylesheet" href="{{asset('public/css/flatpickr.min.css')}}">



<link rel="stylesheet" type="text/css" href="{{asset('public/css/trix.css')}}">
@endsection
@section('content')

<div class="card card-default">
	

	<div class="card-header">
		{{ isset($posts)?'Update Post':'Create Post'}}
		
	</div>
	<div class="card-body">
		<form action="{{isset($posts)?route('post.update',$posts->id):route('post.store')}}"  method="POST" enctype="multipart/form-data" >
            @csrf
            @if(isset($posts))
            @method('put')
            @endif
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" id="title" name="title" value="{{isset($posts)?$posts->title:''}}" class="form-control" placeholder="title">
			</div>
			<div class="form-group">
				<label for="alt">Alt</label>
				<input type="text" id="alt" name="alt" value="{{isset($posts)?$posts->alt:''}}" class="form-control" placeholder="alt">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea  id="description" rows="5" cols="5"
				 name="description" placeholder="Description" class="form-control">{{isset($posts)?$posts->description:''}}</textarea>
				
			</div>
			<div class="form-group">

				<label for="content">Content</label>
				 <input id="content" type="hidden" name="content" value="{{isset($posts)?$posts->content:''}}">
                  <trix-editor  input="content"></trix-editor>
			</div>
			@if(isset($posts))
            <div class="form-group">
            	<img src="{{asset('/public/storage')}}/{{$posts->image}}" style="width:200px; height:200px;">
            </div>
			@endif
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" id="image" name="image" class="form-control" placeholder="Image">
			</div>
			<div class="form-group">
				<label for="categorie_id">Category</label>
				<select name="categorie_id" id="categorie_id" class="form-control">
                  @foreach($categories as $category)
					<option  value="{{$category->id}}"
					@if(isset($posts))
					       @if($category->id == $posts->categorie_id)
					             selected
					        @endif
					@endif
					>
					
					{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="user_id">User Name</label>
				<select name="user_id" id="user_id" class="form-control">
                  @foreach($users as $user)
					<option  value="{{$user->id}}"
					@if(isset($posts))
					@if($user->id == $posts->user_id)
					selected
					@endif
					@endif
					>
					
					{{$user->name}}</option>
					@endforeach
				</select>
			</div>
			@if($tages->count()>0)
			<div class="form-group">
				<label for="tag">Tag</label>
			
                <select name="tag[]" id="tag" class="form-control js-example-basic-multiple" multiple="multiple">
				@foreach($tages as $tag)
                  <option value="{{$tag->id}}"
				 @if(isset($posts))
                 @if($posts->hastag($tag->id))
				  selected
				  @endif
				  @endif>{{$tag->name}}</option>
				  @endforeach
				</select>
			
			</div>
			@endif
			<div class="form-group">
				<label for="published_at">Published_at</label>
				<input type="text" id="published_at" value="{{isset($posts)?$posts->published_at:''}}" name="published_at" class="form-control" placeholder="published_at">
			</div>
			<div class="form-group">
				<button class="btn btn-success">{{ isset($posts)?'Update Post':'Create Post'}}</button>
			</div>
		</form>
	</div>

</div>


@endsection
@section('script')
<script src="{{asset('public/css/select2.min.js')}}"></script>
<script src="{{asset('public/css/flatpickr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/css/trix.js')}}"></script>
<script type="text/javascript">
	flatpickr('#published_at',{
		enableTime:true
		
	});

</script>
<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>
@endsection
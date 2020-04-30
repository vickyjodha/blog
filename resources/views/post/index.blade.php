@extends('layouts.app')
@section('title')
  CMS:POST
@endsection
@section('content')

<div class="d-flex justify-content-end">
<a href="{{route('post.create')}}" class="btn btn-success mb-2"> Add Post</a>
</div>
<div class="card card-default">
	<div class="card-header">
	Post
       
	
		
		
	</div>
	<div class="card-body">
		@if($post->count()>0)
		<table class="table responsive">
			<thead>
				<tr>
					
					<th>Title</th>
					<th>Image</th>
					<th>Category</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				@foreach($post as $posts)
				<tr>
					
					<td>{{$posts->title}}</td>
					<td><image src="public/storage/{{$posts->image}}" width="60px" height="60px" alt="jodhasafa"> </td>
					<td><a href="{{route('categories.edit',$posts->categorie->id)}}">{{$posts->categorie->name}}</a></td>
					<td>					
                      @if($posts->trashed())
                       <form action="{{route('restore',$posts->id)}}" method="POST">
                     	@csrf
                     	@method('PUT')
                     	 <button type="submit"  class="btn btn-info btn-sm float-right">Restore</button>
                     </form>
                      <form action="{{route('post.destroy',$posts->id)}}" method="POST">
                    	@csrf
                      @method('delete')
                    	<button type="submit" class="btn btn-danger btn-sm float-right">
                       Delete
                    	</button>
                    </form>
                     
                  
                  @else
						<a href="{{ route('post.show',$posts->id)}}" class="btn btn-info btn-sm float-right">View
						</a>
                  

					@endif
               </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		   
			<h1 style="text-align: center"> No Post</h1>
		
	
		@endif
	</div>
	
</div>


@endsection
@section('secripts')


@endsection
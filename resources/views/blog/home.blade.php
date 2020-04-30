@extends('layout.index')
@section('title')
blog:home
@endsection


@section('content')

 

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
        <!-- Blog Post -->
        @forelse($posts as $post)
        <div class="card mb-4"><a href="{{route('blog.post',$post->id)}}">
          <img class="card-img-top  " src="{{asset('public/storage')}}/{{$post->image}}" height="400px" alt="Card image cap"></a>
          <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->description}}</p>
            <a href="{{route('blog.post',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
          {{$post->published_at}} by
            <a href="#">{{$post->user->name}}</a>
          </div>
        </div>

       @empty
       <p class="text-center">No  Found Result  for Query <strong>{{request()->query('search')}}</strong>
       </p>
    @endforelse  
  
{{$posts->appends(['search'=>request()->query('search')])->links()}}
@endsection

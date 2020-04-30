@extends('layout.index')
@section('title')
Blog:{{$posts->title}}
@endsection

@section('content')

<!-- Title -->
<h1 class="mt-4">{{$posts->title}}</h1>

<!-- Author -->
<p class="lead">
  by
  <a class="text-decoration-none" href="{{$posts->user->id}}">{{$posts->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>{{$posts->published_at}} </p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="{{asset('public/storage')}}/{{$posts->image}}"  alt="">

<hr>

<!-- Post Content -->
{!! $posts->content !!}

<div class="card-default">
<div class="card-header">Tags</div>

<div class="card-body">
@foreach($posts->tag as $tags)

<a href="{{route('blog.tages',$tags->id)}}" class="btn btn-outline-primary text-decoration-none">{{$tags->name}}</a>
@endforeach
</div>
</div>


<blockquote class="blockquote">
  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  <footer class="blockquote-footer">Someone famous in
    <cite title="Source Title">Source Title</cite>
  </footer>
</blockquote>

<p> ipsm dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

<hr>



<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url ="{{config('app.url')}}/new year/cms/blog/{{$posts->id}}";  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = "{{$posts->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://blog-boar0kxfhm.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
              

@endsection

@extends('layouts.app')
@section('title')
CMS:{{$posts->title}}  
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
@section('content')
<style type="text/css">
	input:read-ony{
background-color: red;
	}
</style>
  <h1 class="text-center my-5">{{$posts->title}}</h1>
           
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">
                            Detail
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <label>Title</label>
                                <li class="list-group-item">
                                    {{$posts->title}}
                                    
                                </li>
                                 <label>Description</label>
                                 <li class="list-group-item">
                                    {{$posts->description}}
                                    
                                </li>
                                 <label>Image</label>
                                <li class="list-group-item mr-0">
                                    
                                    <img src="../public/storage/{{$posts->image}}" height="60px" width="60px">
                                </li>
                                 <label>Content</label>
                                 <li class="list-group-item">
                                 	 <input id="content" type="hidden"  name="content" value="{{$posts->content}}" >
                                     <trix-editor  input="content" ></trix-editor>
                                 
                                    
                                    
                                </li>
                                 <label>Published_at</label>

                                 <li class="list-group-item">
                                    {{$posts->published_at}}
                                    
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                  <table class="">
                  	<tbody>
                  		<tr>
                  			  
                   <td> <a href="{{route('post.edit',$posts->id)}}" class="btn btn-info  btn-sm my-2">Edit</a></td>
                    <td><form action="{{route('post.destroy',$posts->id)}}" method="POST">
                    	@csrf
                      @method('delete')
                    	<button type="submit" class="btn btn-danger btn-sm my-2">
                       {{$posts->trashed()?'Delete':'Trash'}}
                    	</button>
                    </form>
                </td>
                     <td>
                     	<a href="{{route('post.destroy',$posts->id)}}" class="btn btn-danger  btn-sm my-2">delete</a>
                     </td>
                  		</tr>
                  	</tbody>
                  </table>
                </div>

            </div>

@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

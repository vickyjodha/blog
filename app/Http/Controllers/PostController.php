<?php

namespace App\Http\Controllers;
use App\post;
use App\user;
use App\tag;
use App\categorie;
use App\Http\Requests\post\CreatePostRequest;
use App\Http\Requests\post\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
  public function __construct(){
      $this->middleware('verifiedcategoricount')->only(['create','store']);
      $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      
         $post=post::all();
        return view('post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $categories=Categorie::all();
        return view('post.create',compact('categories'))
        ->with('users', user::all())
        ->with('tages',tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
         {     
        $images=$request->image->store('posts');
       
         $posts= new post;
        $posts->title      =$request->title;
        $posts->description=$request->description;
        $posts->content    =$request->content;
        $posts->image      =$images;
        $posts->user_id=$request->user_id;
        $posts->alt=$request->alt;
        $posts->categorie_id=$request->categorie_id;
        $posts->published_at=$request->published_at;

        $posts->save();
        if($request->tag){
            $posts->tag()->attach($request->tag);
        }
       return redirect(route('post.index'))->with('sucssucsMsg',"Your Post Succesfully insert");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $categories=categorie::find($id);
        $posts=post::find($id);
      return view('post.show',compact('posts'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $posts = post::find($id);
        
        return view('post.create',compact('posts'))
        ->with('categories', categorie::all())
        ->with('users', user::all())
        ->with('tages',tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {  
      
        $posts= post::find($id);
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->content=$request->content;
        $posts->user_id=$request->user_id;
        $posts->alt=$request->alt;
        if ($request->hasFile('image')) {
           $image=$request->image->store('posts');
           
           Storage::delete($posts->image);
           $posts['image']=$image;

        }
        $posts->categorie_id=$request->categorie_id;
        $posts->published_at=$request->published_at;
        $posts->save();
      if($request->tag){
          $posts->tag()->sync($request->tag);
      }
        return redirect(route('post.index'))->with('sucssucsMsg',"Your Post Succesfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { $posts=post::withTrashed()->where('id',$id)->firstorFail();   
     if ($posts->trashed()) {
        Storage::delete($posts->image);
        $posts->ForceDelete();
    }else{
        
        $posts->delete();
    }
        return redirect()->route('post.index')->with('sucssucsMsg',"Your Post Succesfully Trash");
       
    }
    public function trashpost(){
        $trashed=post::onlyTrashed()->get();
          return view('post.index')->with('post',$trashed);
    }
    public function restore($id){
         $posts=post::onlyTrashed()->where('id',$id)->firstorFail();
         $posts->restore();

        return redirect()->route('post.index')->with('sucssucsMsg',"Your Post Succesfully Restore");
    }
}

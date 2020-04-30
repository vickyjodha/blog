<?php

namespace App\Http\Controllers;
use App\post;
use App\tag;
use App\Categorie;
use App\user;
use App\auth;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    

  public function blog_index(){
   
    
      return view('blog.home')
      ->with('posts',post::searched()->simplepaginate(1))
      ->with('categories',Categorie::all())
      ->with('tages',tag::all());
  }
  public function post_index($post){
      
      return view('blog.post')
      ->with('posts',post::find($post))
      ->with('categories',Categorie::all())
      ->with('tages',tag::all());
  }
 public function tages(Tag $tages){
  

   return view('blog.tages')
   ->with('categories',Categorie::all())
   ->with('tag',$tages)
   ->with('tages',tag::all())
   ->with('posts',$tages->posts()->searched()->simplepaginate(2));
 }
 public function categories(Categorie $categories){
   //$categories=categories::find($categories);
  return view('blog.categories')
  ->with('categories',Categorie::all())
  ->with('categorie',$categories)
  ->with('tages',tag::all())
  ->with('posts',$categories->posts()->searched()->simplepaginate(3));
}
}

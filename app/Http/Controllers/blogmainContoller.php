<?php

namespace App\Http\Controllers;
use App\post;
use App\user;
use App\tag;
use App\categorie;
use Illuminate\Http\Request;

class blogmainContoller extends Controller
{
public function slidemain(){
    return view('layout.index')
    ->with('categories',Categorie::all())
    ->with('tages',tag::all());

}
}

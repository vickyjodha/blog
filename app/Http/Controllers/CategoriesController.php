<?php

namespace App\Http\Controllers;
use App\categorie;
use App\Http\Requests\category\CreateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $categories=categorie::all();
        return view('categories.index', compact('categories'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
       
        $data= new Categorie;
        $data->name=$request->name;
        $data->save();
        return redirect(route('categories.index',))->with('sucssucsMsg',"your Categories succesfully insert");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $categories=Categorie::find($id);
       return view('categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(CreateCategoryRequest $request, $id)
    {   $data= Categorie::find($id);
        $data->name=$request->name;
        $data->save();
        return redirect(route('categories.index',))->with('sucssucsMsg',"your Categories succesfully Update");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoery)
    {$categories=Categorie::find($categoery);
        if($categories->posts->count()>0){
            return redirect()->back()->with('error',"tag cannot be deleted , bacuse it is associated to some posts.");
        }
        $categories->delete();
        return redirect(route('categories.index',))->with('sucssucsMsg',"your Categories succesfully Delete");
    }
}

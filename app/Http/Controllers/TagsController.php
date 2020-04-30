<?php

namespace App\Http\Controllers;
use App\Http\Requests\tag\CreateTagRequest;
use App\Http\Requests\tag\UpdateTagRequest;
use Illuminate\Http\Request;
use App\Tag;
use App\post;
class TagsController extends Controller
{

    public function __construct(){
         $this->middleware(['auth','verified']);
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $tages=tag::all();
        return view('tag.index' , compact('tages')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        $data= new tag;
        $data->name=$request->name;
        $data->save();
        return redirect(route('tag.index',))->with('sucssucsMsg',"your Tag succesfully insert");
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
    public function edit($tag)
    {
        $tages=tag::find($tag);
       return view('tag.create',compact('tages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        $data= tag::find($id);
        $data->name=$request->name;
        $data->save();
        return redirect(route('tag.index',))->with('sucssucsMsg',"your Tag succesfully Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)    {
        $tages=tag::find($tag);
        if($tages->posts->count()>0){
            return redirect()->back()->with('error',"tag cannot be deleted , bacuse it is associated to some posts.");
    
        }
       $tages->delete();
        return redirect(route('tag.index',))->with('sucssucsMsg',"your Tag succesfully Delete");
    }
}

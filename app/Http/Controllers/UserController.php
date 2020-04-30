<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

use  App\Http\Requests\user\UpdateUserRequest;
class UserController extends Controller
{
    public function user_index(){
        $users=User::all();
        return view('user.index',compact('users'));
}
public function makeadmin(User $user){
    
    $user->role='admin';
    $user->save();
    return redirect()->route('user.index')->with('sucssucsMsg',"Your User Succesfully admin");
}
public function user_profile(User $user){
 return view('user.profile',compact('user'));

}
public function user_edit(User $user){
    return view('user.edit',compact('user'));
}
    
    public function user_update(UpdateUserRequest $request,$user){
        $users=User::find($user);
        
      $users->name=$request->name;
      $users->email=$request->email;
              
        $users->update();
        return redirect(route('home'))->with('sucssucsMsg',"Your Profile  Succesfully Updated");
    }
}
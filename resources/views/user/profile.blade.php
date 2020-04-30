@extends('layouts.app')

@section('content')

     
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                 <table class="table responsive">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         <tr>
                         <td>{{Auth::user()->name}}</td>
                         
                         <td>{{Auth::user()->email}}</td>
                         <td><a href="{{route('user.edt',Auth::user()->id)}}" class="btn btn-info btn-sm">Edit</a>
                         </td>
                         </tr>
                        </tbody>
                 </table>  
                </div>
            </div>
        
 
@endsection

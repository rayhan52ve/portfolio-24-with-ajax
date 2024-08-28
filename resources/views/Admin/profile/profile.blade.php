@extends('Admin.partials.master')

@section('content')
<div class="container" style="margin-top:80px">
  <div class="row ">
       <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3>User Info</h3>
            </div>
            <div class="card-body">
              @if(session()->has('msg'))
                    <div class="alert alert-{{session('cls')}}">
                      {{session('msg')}}
                    </div>
              @endif
              <table class="table table-sm">
                <tbody>
                  <tr class="pb-6">
                    <td>
                    @if(auth()->user()->image)
                    <img src="{{ asset(auth()->user()->image) }}" width="100px" height="100px">
                    @else
                    <img src="{{ asset('backend/img/profile/profile-6.webp') }}" width="100px" height="100px">
                    </td>
                    @endif
                  </tr>
                  <tr>
                    <th scope="col">Name</th>
                    <td><b>{{auth()->user()->name}}<b></td>
                  </tr>
                  <tr>
                    <th scope="col">Description</th>
                    <td>{{auth()->user()->description}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Email</th>
                    <td>{{auth()->user()->email}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Phone</th>
                    <td>{{auth()->user()->phone}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Designation</th>
                    <td>{{auth()->user()->designation}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Address</th>
                    <td>{{auth()->user()->address}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Age</th>
                    <td>{{auth()->user()->age}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Nationality</th>
                    <td>{{auth()->user()->nationality}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Languages</th>
                    <td>{{auth()->user()->languages}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Total Experience</th>
                    <td>{{auth()->user()->experience}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Freelance</th>
                    <td>{{auth()->user()->freelance}}</td>
                  </tr>
                  <tr>
                    <th scope="col">LinkedIn</th>
                    <td>{{auth()->user()->linkedin}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Project Completed</th>
                    <td>{{auth()->user()->complete_project}}</td>
                  </tr>
                  <tr>
                    <th scope="col">CV</th>
                    <td><a target="__blanck" href="{{asset(Auth::user()->cv)}}"><i style="font-size: 20px" class="fa-solid fa-file-pdf"></i></a></td>
                    {{-- <td>{{auth()->user()->cv}}</td> --}}
                  </tr>
              </table> 
              <a class="btn btn-info " href="{{route('profile_edit',$user->id)}}">Edit</a>            
              <a class="btn btn-danger " href="{{route('changePassword')}}">Change Password</a>            
             </div>
        </div>
     </div>
     </div>
  </div>
    
@endsection


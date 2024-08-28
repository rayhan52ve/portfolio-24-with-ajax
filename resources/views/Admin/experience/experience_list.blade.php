@extends('Admin.partials.master')

@section('content')
<div class="container" style="margin-top:80px">
  <div class="row ">
       <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3>Experience Info</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Experience Type</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Years of Experience</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="w-25 p-3">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $sl=1
                      @endphp
                      @foreach ($experiences as $exp)
                      <tr>
                        <th scope="row">{{$sl++}}</th>
                        <td>{{$exp->title}}</td>
                        <td>{{$exp->sector}}</td>
                        <td>{{$exp->time}}</td>
                        <td>{{$exp->description}}</td>
                        <td>
                          <a type="button" href="{{route('experiences.edit',$exp)}}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                          <form action="{{ route('experiences.destroy', $exp)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                          </form>
                        </td>

                      </tr>
                      @endforeach  
                    </tbody>
                  </table>
             </div>
        </div>
     </div>
     </div>
  </div>
    
@endsection


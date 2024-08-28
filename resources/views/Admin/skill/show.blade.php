@extends('Admin.partials.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <h3>Skills Info</h3>
                </div>
                <div class="card-body">
                    @if(session('msg'))
                        <div class="alert alert-{{session('cls')}} alert-dismissible fade show" role="alert">
                            {{ session('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Program</th>
                                <th>Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $sl=1
                            @endphp
                            @foreach($skills as $skill)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$skill->program}}</td>
                                <td>{{$skill->percentage}}</td>
                                <td>
                                    <a href="{{route('skils.edit',$skill)}}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                                       
                                        <form action="{{route('skils.destroy', $skill)}}" method="post">
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
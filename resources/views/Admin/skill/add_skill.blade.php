@extends('Admin.partials.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2" style="margin-top: 80px">
            <div class="card">
            @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Good News!!</strong>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <div class="card-header">
                    <h3>Add Skills</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('msg'))
                        <div class="alert alert-{{session('cls')}} alert-dismissible fade show" role="alert">
                            {{session('msg')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{route('skils.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="program">Program</label>
                            <input type="text" class="form-control" name="program" placeholder="Enter Your Program" value="{{old('program')}}">

                            <label for="percentage">Percentage</label>
                            <input type="number" class="form-control" name="percentage" placeholder="Enter Percentage" value="{{old('percentage')}}" >

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@extends('Admin.partials.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2" style="margin-top: 80px">
            <div class="card">

                <div class="card-header">
                    <h3>Update Skills</h3>
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
                    <form action="{{route('skils.update', $skill->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="program">Program</label>
                            <input type="text" class="form-control" name="program" placeholder="Enter Your Program" value="{{$skill->program}}">

                            <label for="percentage">Percentage</label>
                            <input type="number" class="form-control" name="percentage" placeholder="Enter Percentage" value="{{$skill->percentage}}">

                            <button type="submit" class="btn btn-primary mt-3">Update</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
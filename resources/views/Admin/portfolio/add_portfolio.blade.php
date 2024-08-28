@extends('Admin.partials.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2" style="margin-top: 50px">
            <div class="card">
                <div class="card-header">
                    <h3>Add Project</h3>
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
                   
                    <form action="{{route('portfolios.store')}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">

                            <label for="project">Client</label>
                            <input type="text" class="form-control" name="client" placeholder="Enter Your Project">

                            <label for="language">Technology:</label>
                            <input type="text" class="form-control" name="technology" placeholder="Enter Technologies">

                            <label for="language">Preview Link:</label>
                            <input type="text" class="form-control" name="preview" placeholder="Enter Preview Link">

                            <label for="language">Order By:</label>
                            <input type="number" class="form-control" name="order_by" placeholder="Enter Serial Order">

                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@extends('Admin.partials.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2" style="margin-top: 50px">
            <div class="card">

                <div class="card-header">
                    <h3>Update Portfolio</h3>
                </div>
                <div class="card-body">
                   
                    <form action="{{route('portfolios.update', $portfolio->id)}}" method="post" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$portfolio->title}}">

                            <label for="project">Client</label>
                            <input type="text" class="form-control" name="client" value="{{$portfolio->client}}" placeholder="Enter Your Project">

                            <label for="language">Technology:</label>
                            <input type="text" class="form-control" name="technology" value="{{$portfolio->technology}}" placeholder="Enter Technologies">

                            <label for="language">Preview Link:</label>
                            <input type="text" class="form-control" name="preview" value="{{$portfolio->preview}}" placeholder="Enter Preview Link">

                            <label for="language">Order By:</label>
                            <input type="number" class="form-control" name="order_by" value="{{$portfolio->order_by}}" placeholder="Enter Serial Order">

                            <label for="image">Image</label>
                            <input type="file" class="form-control " name="image">
                            <img src="{{asset($portfolio->image)}}" height="100" width="100">

                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
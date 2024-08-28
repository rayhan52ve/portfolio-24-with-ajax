@extends('Admin.partials.master')

@section('content')
  <div class="container" style="margin-top:80px">
     <div class="row ">
        <div class="col-md-6 offset-3 ">
        <div class="card">
            <div class="card-header">
                <h3>Edit Experience Info</h3>
            </div>
            <div class="card-body">
              @if($errors->any())
               <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                </ul>
               </div>
              @endif
                <form action="{{route('experiences.update',$experience->id)}}" method="post">
                    @method('PUT') 
                    @csrf
                    <div class="form-group">
                      <label for="title">Experience Type</label>
                      <input type="text" value="{{$experience->title}}" name="title" class="form-control" id="" placeholder="Enter experience">
                    </div>
                    <div class="form-group">
                      <label for="sector">Institute</label>
                      <input type="text" value="{{$experience->sector}}" name="sector" class="form-control" id="" placeholder="Institute">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea type="text" value="" name="description" class="form-control" id="" placeholder="Description">{{$experience->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="time">Years of Experience</label>
                      <input type="text" value="{{$experience->time}}" name="time" class="form-control" id="" placeholder="Years of Experience">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
             </div>
        </div>
     </div>
  </div>
</div>
    
@endsection


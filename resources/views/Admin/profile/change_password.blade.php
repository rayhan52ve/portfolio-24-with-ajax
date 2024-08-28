@extends('Admin.partials.master')

@section('content')

    <div class="container" style="margin-top:80px">
        <div class="row ">
            <div class="col-md-6 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Change Pasword</p>
                            <hr>
                            @if (session('message'))
                                <h5 class="alert alert-{{ session('cls') }} mb-2">{{ session('message') }}</h5>
                            @endif
        
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger m-2">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ route('updatePassword') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Current Password</label>
                                    <input type="password" name="current_password" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" />
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn btn-success text-light">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection

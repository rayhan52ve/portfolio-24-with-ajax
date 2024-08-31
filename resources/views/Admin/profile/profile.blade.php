@extends('Admin.partials.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3>User Info</h3>
                    </div>
                    <div class="card-body">
                        @if (session()->has('msg'))
                            <div class="alert alert-{{ session('cls') }}">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <form action="{{ route('profile_update', Auth::user()->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">

                                <div class="form-group mt-2">
                                    <label class="image" for="imageInput">
                                        <input id="imageInput" type="file" name="image">
                                        <img id="profileImage" class="img-thumbnail" src="{{ asset($user->image) }}">
                                        Choose Photo
                                    </label>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="">CV</label>
                                    <input type="file" class="form-control" name="cv">
                                    @if (Auth::user()->cv)
                                        <a target="__blanck" href="{{ asset(Auth::user()->cv) }}"
                                            class="btn btn-outline-success m-1"><i style="font-size: 20px"
                                                class="fa-solid fa-file-pdf"></i> View CV </a>
                                    @endif

                                </div>
                                <div class="form-group mt-5">
                                    <label for="">Name</label>
                                    <input value="{{ Auth::user()->name }}" type="text" class="form-control"
                                        Name="name">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Description</label>
                                    <textarea class="form-control" Name="description" rows="3">{{ Auth::user()->description }}</textarea>
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Email</label>
                                    <input value="{{ Auth::user()->email }}" type="email" class="form-control"
                                        Name="email">
                                </div>

                                <div class="form-group mt-1">
                                    <label for="">Phone</label>
                                    <input value="{{ Auth::user()->phone }}" type="text" class="form-control"
                                        Name="phone">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Designation</label>
                                    <input value="{{ Auth::user()->designation }}" type="text" class="form-control"
                                        Name="designation">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Address</label>
                                    <input value="{{ Auth::user()->address }}" type="text" class="form-control"
                                        Name="address">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Age</label>
                                    <input value="{{ Auth::user()->age }}" type="text" class="form-control"
                                        Name="age">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">GitHub</label>
                                    <input value="{{ Auth::user()->nationality }}" type="text" class="form-control"
                                        Name="nationality">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">LinkedIn</label>
                                    <input value="{{ Auth::user()->linkedin }}" type="text" class="form-control"
                                        Name="linkedin">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Languages</label>
                                    <input value="{{ Auth::user()->languages }}" type="text" class="form-control"
                                        Name="languages">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Total Experience</label>
                                    <input value="{{ Auth::user()->experience }}" type="text" class="form-control"
                                        Name="experience">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Freelance</label>
                                    <input value="{{ Auth::user()->freelance }}" type="text" class="form-control"
                                        Name="freelance">
                                </div>

                                <div class="form-group mt-1">
                                    <label for="">Completed Projects</label>
                                    <input value="{{ Auth::user()->complete_project }}" type="text"
                                        class="form-control" Name="complete_project">
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                            <a class="btn btn-danger mt-4" href="{{ route('changePassword') }}">Change Password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <style>
            .image {
                display: block;
                width: 60vw;
                max-width: 120px;
                /* background-color: cornflowerblue; */
                border-radius: 2px;
                font-size: 1em;
                line-height: 2.5em;
                text-align: center;
            }

            .image:hover {
                background-color: rgb(219, 243, 219);
            }

            .image:active {
                background-color: mediumaquamarine;
            }

            #imageInput {
                border: 0;
                clip: rect(1px, 1px, 1px, 1px);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
        </style>
    @endpush

    @push('js')
        <script>
            // Get references to the input and img elements
            var imageInput = document.getElementById("imageInput");
            var profileImage = document.getElementById("profileImage");

            // Add an event listener to the input element
            imageInput.addEventListener("change", function() {
                // Check if a file has been selected
                if (imageInput.files && imageInput.files[0]) {
                    var reader = new FileReader();

                    // When the file is loaded, set the src attribute of the img element
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                    };

                    // Read the selected file as a data URL
                    reader.readAsDataURL(imageInput.files[0]);
                }
            });
        </script>
    @endpush
@endsection

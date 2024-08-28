@extends('Admin.partials.master')

@section('content')
    @push('css')
        <style>
            .image {
                display: block;
                width: 60vw;
                max-width: 100px;
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

    <div class="container" style="margin-top:80px">
        <div class="row ">
            <div class="col-md-6 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit User Info</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile_update', Auth::user()->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input value="{{ Auth::user()->name }}" type="text" class="form-control"
                                        Name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Description</label>
                                    <textarea class="form-control" Name="description" rows="3">{{ Auth::user()->description }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input value="{{ Auth::user()->email }}" type="email" class="form-control"
                                        Name="email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input value="{{ Auth::user()->phone }}" type="text" class="form-control"
                                        Name="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Designation</label>
                                    <input value="{{ Auth::user()->designation }}" type="text" class="form-control"
                                        Name="designation">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Address</label>
                                    <input value="{{ Auth::user()->address }}" type="text" class="form-control"
                                        Name="address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Age</label>
                                    <input value="{{ Auth::user()->age }}" type="text" class="form-control"
                                        Name="age">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nationality</label>
                                    <input value="{{ Auth::user()->nationality }}" type="text" class="form-control"
                                        Name="nationality">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Languages</label>
                                    <input value="{{ Auth::user()->languages }}" type="text" class="form-control"
                                        Name="languages">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Total Experience</label>
                                    <input value="{{ Auth::user()->experience }}" type="text" class="form-control"
                                        Name="experience">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Freelance</label>
                                    <input value="{{ Auth::user()->freelance }}" type="text" class="form-control"
                                        Name="freelance">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">LinkedIn</label>
                                    <input value="{{ Auth::user()->linkedin }}" type="text" class="form-control"
                                        Name="linkedin">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Completed Projects</label>
                                    <input value="{{ Auth::user()->complete_project }}" type="text" class="form-control"
                                        Name="complete_project">
                                </div>
                                <div class="form-group col-md-6 mt-2">
                                    <label for="">CV</label>
                                    <input type="file" class="form-control" value="{{ asset(Auth::user()->cv) }}"
                                        name="cv">
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label class="image" for="imageInput">Choose Photo
                                        <input id="imageInput" type="file" value="{{ asset(Auth::user()->image) }}"
                                            name="image">
                                        <img id="profileImage" src="{{ asset($user->image) }}" height="100"
                                            width="100">
                                    </label>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

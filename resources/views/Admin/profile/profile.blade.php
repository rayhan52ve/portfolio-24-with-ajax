@extends('Admin.partials.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>My Bio</h3>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" action="{{ route('profile_update', Auth::user()->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">

                                <div id="profileImageForm" class="form-group mt-2 col-md-6">
                                    <label class="image" for="imageInput">
                                        <input id="imageInput" type="file" name="image">
                                        <img id="profileImage" class="img-thumbnail" src="{{ asset($user->image) }}">
                                        Choose Photo
                                    </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="imageCrop"
                                            name="image_crop" disabled>
                                        <label class="form-check-label" for="imageCrop">Image Crop</label>
                                    </div>
                                </div>
                                <div class="form-group mt-2 col-md-6">
                                    <div id="formCv">
                                        <label for="">Upload CV</label>
                                        <input type="file" class="form-control" name="cv">
                                        @if (Auth::user()->cv)
                                            <a target="__blanck" href="{{ asset(Auth::user()->cv) }}"
                                                class="btn btn-outline-success m-1"><i style="font-size: 20px"
                                                    class="fa-solid fa-file-pdf"></i> View CV </a>
                                        @endif
                                    </div>
                                </div>
                                {{-- <hr> --}}
                                <div class="form-group mt-5 col-md-6">
                                    <label for="">Name</label>
                                    <input value="{{ Auth::user()->name }}" type="text" class="form-control"
                                        Name="name">
                                </div>
                                <div class="form-group mt-5 col-md-6">
                                    <label for="">Phone</label>
                                    <input value="{{ Auth::user()->phone }}" type="text" class="form-control"
                                        Name="phone">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Description</label>
                                    <textarea class="form-control" Name="description" rows="3">{{ Auth::user()->description }}</textarea>
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">Email</label>
                                    <input value="{{ Auth::user()->email }}" type="email" class="form-control"
                                        Name="email">
                                </div>

                                <div class="form-group mt-1 col-md-6">
                                    <label for="">Designation</label>
                                    <input value="{{ Auth::user()->designation }}" type="text" class="form-control"
                                        Name="designation">
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">Address</label>
                                    <input value="{{ Auth::user()->address }}" type="text" class="form-control"
                                        Name="address">
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">Age</label>
                                    <input value="{{ Auth::user()->age }}" type="text" class="form-control"
                                        Name="age">
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">GitHub</label>
                                    <input value="{{ Auth::user()->nationality }}" type="text" class="form-control"
                                        Name="nationality">
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">LinkedIn</label>
                                    <input value="{{ Auth::user()->linkedin }}" type="text" class="form-control"
                                        Name="linkedin">
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">Languages</label>
                                    <input value="{{ Auth::user()->languages }}" type="text" class="form-control"
                                        Name="languages">
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">Total Experience</label>
                                    <input value="{{ Auth::user()->experience }}" type="text" class="form-control"
                                        Name="experience">
                                </div>
                                <div class="form-group mt-1 col-md-6">
                                    <label for="">Freelance</label>
                                    <input value="{{ Auth::user()->freelance }}" type="text" class="form-control"
                                        Name="freelance">
                                </div>

                                <div class="form-group mt-1 col-md-6">
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

    <div id="spinner-overlay" style="display: none;">
        <div class="loadingio-spinner">
            <!-- Load the external SVG from assets -->
            <img src="{{ asset('loading/Interwind@1x-1.0s-200px-200px.svg') }}" alt="Loading Spinner" width="200"
                height="200">
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

            #spinner-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.497);
                /* Darker semi-transparent background */
                z-index: 9999;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    @endpush

    @push('js')
        <script>
            $(document).ready(function() {
                $(document).ready(function() {
                    let initialFormData = $('#profileForm').serialize();
                    let initialImage = $('#imageInput').val(); // Store initial image state
                    let initialCV = $('input[name="cv"]').val(); // Store initial CV state

                    $(document).off('submit', '#profileForm').on('submit', '#profileForm', function(e) {
                        e.preventDefault();

                        let currentFormData = $(this).serialize();
                        let currentImage = $('#imageInput').val(); // Check the current image input
                        let currentCV = $('input[name="cv"]').val(); // Check the current CV input

                        // Compare form data, image input, and CV input
                        if (currentFormData === initialFormData && !currentImage && !currentCV) {
                            // No form changes, no new image, and no new CV selected
                            Swal.fire({
                                position: 'top-end',
                                icon: 'info',
                                toast: true,
                                title: 'No changes were made.',
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 3000,
                                showCloseButton: true
                            });
                        } else {
                            // Proceed with form submission
                            let formAction = $(this).attr('action');
                            let formData = new FormData(this); // Use FormData for file uploads

                            $.ajax({
                                type: "POST", // or "PUT"
                                url: formAction,
                                data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend: function() {
                                    $('#spinner-overlay').show();
                                },
                                success: function(response) {
                                    if (response.status == '200') {
                                        $('#myProfileImage').load(location.href +
                                            ' #myProfileImage');
                                        $('#formCv').load(location.href +
                                            ' #formCv');
                                        $('#profileImageForm').load(location.href +
                                            ' #profileImageForm',
                                            function() {
                                                reinitializeImagePreview();
                                            });

                                        Swal.fire({
                                            position: 'top-end',
                                            icon: response.cls,
                                            toast: true,
                                            title: response.msg,
                                            showConfirmButton: false,
                                            timerProgressBar: true,
                                            timer: 5000,
                                            showCloseButton: true
                                        });

                                        // Update the initial form data and file inputs after successful submission
                                        initialFormData = currentFormData;
                                        initialImage = $('#imageInput')
                                            .val(); // Update stored image state
                                        initialCV = $('input[name="cv"]')
                                            .val(); // Update stored CV state
                                    }
                                },
                                complete: function() {
                                    $('#spinner-overlay').hide();
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error occurred:", error);
                                }
                            });
                        }
                    });

                    // Reinitialize image preview
                    function reinitializeImagePreview() {
                        var imageInput = document.getElementById("imageInput");
                        var profileImage = document.getElementById("profileImage");

                        imageInput.addEventListener("change", function() {
                            $('#imageCrop').prop('disabled', false);
                            if (imageInput.files && imageInput.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    profileImage.src = e.target.result;
                                };

                                reader.readAsDataURL(imageInput.files[0]);
                            }
                        });
                    }

                    // Initial call for image preview on page load
                    reinitializeImagePreview();
                });

            });
        </script>
    @endpush
@endsection

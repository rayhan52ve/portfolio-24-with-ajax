@extends('Admin.partials.master')

@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-body p-4">
                        <!-- Title and Back Button Section -->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <!-- Back Button (aligned left) -->
                            <a title="Back" href="{{ route('profile') }}" class="btn btn-sm btn-outline-secondary">
                                <i data-acorn-icon="arrow-left" data-acorn-size=""></i>
                            </a>
                            <!-- Centered Title -->
                            <h3 class="card-title text-center flex-grow-1 text-uppercase text-primary mb-0">
                                <b>Change Password</b>
                            </h3>
                            <!-- Empty placeholder to balance the flex -->
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="togglePassword">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                        <hr>

                        <!-- Password Update Form -->
                        <form id="updatePasswordForm" action="{{ route('updatePassword') }}" method="POST">
                            @csrf

                            <!-- Current Password Field -->
                            <div class="form-group mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" id="current_password" name="current_password" class="form-control"
                                    placeholder="Enter current password" required />
                            </div>

                            <!-- New Password Field -->
                            <div class="form-group mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" id="new_password" name="new_password" class="form-control"
                                    placeholder="Enter new password" required />
                            </div>

                            <!-- Confirm New Password Field -->
                            <div class="form-group mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="form-control" placeholder="Confirm new password" required />
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group mb-3 text-center">
                                <button type="submit" class="btn btn-outline-success w-100">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Spinner Overlay -->
    <div id="spinner" style="display: none;">
        <div class="loadingio-spinner">
            <img src="{{ asset('loading/Interwind@1x-1.0s-200px-200px.svg') }}" alt="Loading Spinner" width="200"
                height="200">
        </div>
    </div>

    @push('css')
        <style>
            /* Spinner Overlay */
            #spinner {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 9999;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* SweetAlert Error Styling */
            .error-popup {
                background-color: #f8d7da;
                color: #721c24;
            }

            .error-title {
                color: #721c24;
            }

            .error-content {
                color: #dc3545;
            }
        </style>
    @endpush
    @push('js')
        <script>
            $(document).ready(function() {

                // password hide unhide
                $('#togglePassword').on('click', function() {
                    console.log('clicked');

                    const currentPassInput = $('#current_password');
                    const newPassInput = $('#new_password');
                    const confirmPassInput = $('#new_password_confirmation');
                    const icon = $(this).find('i');

                    if (currentPassInput.attr('type') === 'password') {
                        currentPassInput.attr('type', 'text');
                        newPassInput.attr('type', 'text');
                        confirmPassInput.attr('type', 'text');
                        icon.removeClass('fa-eye-slash').addClass('fa-eye');
                    } else {
                        currentPassInput.attr('type', 'password');
                        newPassInput.attr('type', 'password');
                        confirmPassInput.attr('type', 'password');
                        icon.removeClass('fa-eye').addClass('fa-eye-slash');
                    }
                });

                $(document).on('submit', '#updatePasswordForm', function(e) {
                    e.preventDefault();

                    let formAction = $(this).attr('action');
                    let formData = new FormData(this);

                    $.ajax({
                        type: "POST",
                        url: formAction,
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $('#spinner').show();
                        },
                        success: function(response) {

                            if (response.status == '200') {

                                $('#updatePasswordForm')[0].reset();
                                //show sweetalert
                                Swal.fire({
                                    position: 'center',
                                    icon: response.cls,
                                    toast: false,
                                    title: 'Success!',
                                    text: response.msg,
                                    showConfirmButton: true,
                                    timerProgressBar: true,
                                    timer: 500000,
                                    showCloseButton: false
                                });
                            } else if (response.status == '400') {

                                $('#updatePasswordForm')[0].reset();
                                //show sweetalert error
                                Swal.fire({
                                    position: 'center',
                                    icon: response.cls,
                                    toast: false,
                                    title: 'Error!',
                                    text: response.msg,
                                    showConfirmButton: true,
                                    timerProgressBar: true,
                                    timer: 500000,
                                    showCloseButton: false,
                                    customClass: {
                                        popup: 'error-popup', // Applies to the whole card
                                        title: 'error-title', // Applies to the title
                                        content: 'error-content' // Applies to the content (text)
                                    }
                                });

                            }
                        },
                        complete: function() {
                            $('#spinner').hide();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

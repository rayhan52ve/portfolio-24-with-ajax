@extends('Admin.partials.login')

@section('login')
    <div class="container">
        <div class="d-flex justify-content-center" style="margin-top: 100px">
            <div
                class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
                <div class="sw-lg-50 px-5">
                    <!-- User Profile Start -->
                    <div class="text-center my-4 py-3">
                        <p>Sign In</p>
                        <a href="{{ route('index') }}" class="d-flex justify-content-center align-items-center user">
                            @if ($user->image)
                                <img class="profile rounded-circle border-success" alt="profile"
                                    src="{{ asset($user->image) }}" width="100px" height="100px" />
                            @else
                                <img class="profile rounded-circle" alt="profile"
                                    src="{{ asset('backend/img/profile/profile-6.webp') }}" width="100px" height="100px" />
                            @endif
                        </a>
                        <a href="{{ route('index') }}" class="mt-5">
                            <i class="fa-solid fa-id-card-clip"></i> </a>
                    </div>
                    <!-- User Profile End -->

                    <div>
                        <form id="loginForm" class="tooltip-end-bottom" autocomplete="off" action="{{ route('login') }}"
                            method="post">
                            @csrf
                            <div class="mb-3 filled form-group tooltip-end-top">
                                <i data-acorn-icon="email"></i>
                                <input class="form-control" type="email" placeholder="Email" name="email"
                                    id="email" />
                            </div>
                            <div class="mb-3 filled form-group tooltip-end-top position-relative">
                                <i data-acorn-icon="lock-off"></i>
                                <input class="form-control pe-7" name="password" id="password" type="password"
                                    placeholder="Password" />
                                <button type="button"
                                    class="btn btn-sm rounded btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2"
                                    id="togglePassword">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                                {{-- <a class="text-small position-absolute t-3 e-3" href="{{ route('ForgetPassword') }}">Forgot?</a> --}}
                            </div>

                            <div class="d-flex justify-content-between">
                                <label class="m-1">
                                    <input type="checkbox" name="remember"> Remember me
                                </label>
                                <button type="submit" id="login_btn" class="btn btn-lg btn-primary mt-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {
                $('#togglePassword').on('click', function() {
                    const passwordInput = $('#password');
                    const icon = $(this).find('i');

                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        icon.removeClass('fa-eye-slash').addClass('fa-eye');
                    } else {
                        passwordInput.attr('type', 'password');
                        icon.removeClass('fa-eye').addClass('fa-eye-slash');
                    }
                });
            });
        </script>

        @if (session()->has('msg'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: true,
                    title: '{{ session('title') }}',
                    text: '{{ session('msg') }}',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    showCloseButton: true
                });
            </script>
        @endif
    @endpush
@endsection

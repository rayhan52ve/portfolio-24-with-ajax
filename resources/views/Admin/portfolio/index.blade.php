@extends('Admin.partials.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="table-content" class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <!-- Displaying the range of entries -->
                            <div class="">
                                @php
                                    $start = $portfolios->firstItem();
                                    $end = $portfolios->lastItem();
                                    $total = $portfolios->total();
                                @endphp
                                <h3>Project List</h3>
                                <span class="text-info">Showing {{ $start }} to {{ $end }} of
                                    {{ $total }} entries</span>
                            </div>
                            <div>
                                <a title="Create" href="{{ route('portfolios.create') }}" id="bootModalShow"
                                    class="btn btn-success btn-loading">Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (session('msg'))
                                <div class="alert alert-{{ session('cls') }} alert-dismissible fade show" role="alert">
                                    {{ session('msg') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <table class="table table-striped text-center" style="font-size: 13px">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Technology</th>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Order By</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sl = 1;
                                    @endphp
                                    @forelse ($portfolios as $portfolio)
                                        <tr>
                                            <td scope="row">{{ $sl++ }}</td>
                                            <td>{{ $portfolio->title }}</td>
                                            <td>{{ $portfolio->client }}</td>
                                            <td>{{ $portfolio->technology }}</td>
                                            <td><a href=" {{ $portfolio->preview }}"> {{ $portfolio->preview }}</a></td>
                                            <td>{{ $portfolio->order_by }}</td>
                                            <td>
                                                <img src="{{ asset($portfolio->image) }}" width="75px"
                                                    class="img-thumbnail align-scenter">
                                            </td>
                                            <td>
                                                <a id="bootModalShow" title="Edit"
                                                    href="{{ route('portfolios.edit', $portfolio) }}"
                                                    class="btn btn-warning btn-sm btn-loading"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>

                                                <form id="deleteForm_{{ $portfolio->id }}"
                                                    action="{{ route('portfolios.destroy', $portfolio) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $portfolio->id }}" title="Delete"
                                                        class="delete btn btn-danger btn-sm" type="button"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">No data Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>

                            <div class="d-flex justify-content-center">
                                <p> {{ $portfolios->links() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <style>
            /* Default placeholder color */
            input::placeholder {
                color: #6c757d;
                /* Default placeholder color, gray */
            }

            /* Placeholder turns red when input is invalid */
            input.is-invalid::placeholder {
                color: red;
                /* Red color for invalid placeholders */
            }
        </style>
    @endpush
    @push('js')
        <script>
            $(document).ready(function() {
                // Show Modal on Click
                let dialog = '';

                $(document).off('click', '#bootModalShow').on('click', '#bootModalShow', function(e) {
                    e.preventDefault();

                    // Show loading indicator
                    showLoadingAlert();

                    let modalContentUrl = $(this).attr('href');
                    let modalTitle = $(this).attr('title');

                    // Ajax call to load modal content
                    $.ajax({
                        type: "GET",
                        url: modalContentUrl,
                        success: function(response) {
                            dialog = bootbox.dialog({
                                title: `<h4>${modalTitle} Experience Info</h4>`,
                                message: "<div class='modalContent'></div>",
                                size: 'medium',
                            });

                            // Inject response into Modal Content
                            $('.modalContent').html(response);
                        },
                        complete: function() {
                            // Close SweetAlert after the AJAX call completes
                            Swal.close();
                        }
                    });
                });

                // Store or Update On form Submission
                $(document).off('submit', '#storeAndUpdateForm').on('submit', '#storeAndUpdateForm', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    let formUrl = $(this).attr('action');

                    // Show loading indicator
                    showLoadingAlert();

                    $.ajax({
                        type: "POST",
                        url: formUrl,
                        data: formData,
                        processData: false, // Required for FormData
                        contentType: false, // Required for FormData
                        success: function(response) {
                            if (response.status == 400) {
                                // handle validation Error
                                // Reset all placeholders and error styling before updating with new errors
                                resetPlaceholders();

                                // Handle validation errors by updating placeholders with error messages
                                if (response.errors.title) {
                                    $('input[name="title"]').attr('placeholder', response.errors
                                        .title[0]).addClass('is-invalid');
                                }
                                if (response.errors.client) {
                                    $('input[name="client"]').attr('placeholder', response.errors
                                        .client[0]).addClass('is-invalid');
                                }
                                if (response.errors.technology) {
                                    $('input[name="technology"]').attr('placeholder', response
                                        .errors.technology[0]).addClass('is-invalid');
                                }
                                if (response.errors.preview) {
                                    $('input[name="preview"]').attr('placeholder', response.errors
                                        .preview[0]).addClass('is-invalid');
                                }
                                if (response.errors.order_by) {
                                    $('input[name="order_by"]').attr('placeholder', response.errors
                                        .order_by[0]).addClass('is-invalid');
                                }
                                if (response.errors.image) {
                                    $('input[name="image"]').addClass('is-invalid');
                                }

                            } else if (response.status == 200) {
                                $('.errors').html('').addClass('d-none');
                                $('#table-content').load(location.href + ' #table-content');
                                dialog.modal('hide');

                                // Display SweetAlert for success
                                Swal.fire({
                                    position: 'top-end',
                                    icon: response.cls,
                                    title: response.msg,
                                    toast: true,
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 5000,
                                    showCloseButton: true
                                });

                            }
                        },
                        complete: function() {
                            // Close SweetAlert after the AJAX call completes
                            Swal.close();
                        }
                    });
                });

                // Function to show SweetAlert loading indicator
                function showLoadingAlert() {
                    Swal.fire({
                        title: '<strong style="font-size: 24px; color: #4caf50;">Processing...</strong>',
                        html: '<div style="font-size: 18px; color: #555;">Please wait while your request is being processed.</div>',
                        background: '#f1f1f1', // Change the background color
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading(); // Show loading spinner
                        }
                    });
                }

                // Function to reset placeholders and error styles
                function resetPlaceholders() {
                    $('input[name="title"]').attr('placeholder', 'Enter Title').removeClass('is-invalid');
                    $('input[name="client"]').attr('placeholder', 'Enter Client Name').removeClass('is-invalid');
                    $('input[name="technology"]').attr('placeholder', 'Enter Technologies (e.g., Laravel, AJAX)')
                        .removeClass('is-invalid');
                    $('input[name="preview"]').attr('placeholder', 'Enter Preview Link').removeClass('is-invalid');
                    $('input[name="order_by"]').attr('placeholder', 'Enter Serial Order').removeClass('is-invalid');
                    $('input[name="image"]').removeClass('is-invalid');
                }

                // Delete Ajax Request
                $(document).off('click', '.delete').on('click', '.delete', function(e) {
                    let id = $(this).attr('data-id');
                    let formId = `deleteForm_${id}`;
                    let formAction = $(`#${formId}`).attr('action');


                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            // Show loading indicator
                            showLoadingAlert();

                            $.ajax({
                                type: "POST",
                                url: formAction,
                                data: {
                                    _method: 'DELETE',
                                    _token: $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    if (response.status == '200') {
                                        $('#table-content').load(location.href +
                                            ' #table-content');

                                        // Show success message
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
                                    }
                                }
                            });
                        }
                    });
                });

            });
        </script>
    @endpush
@endsection

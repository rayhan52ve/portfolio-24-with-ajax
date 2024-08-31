@extends('Admin.partials.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="table-content" class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <!-- Displaying the range of entries -->
                            <div class="">
                                @php
                                    $start = $educations->firstItem();
                                    $end = $educations->lastItem();
                                    $total = $educations->total();
                                @endphp
                                <h3>Education Info</h3>
                                <span class="text-info">Showing {{ $start }} to {{ $end }} of
                                    {{ $total }} entries</span>
                            </div>
                            <div>
                                <a title="Create" href="{{ route('educations.create') }}" id="bootModalShow"
                                    class="btn btn-success">Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Degree</th>
                                        <th scope="col">Institute</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="w-25 p-3">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sl = $educations->firstItem();
                                    @endphp
                                    @foreach ($educations as $edu)
                                        <tr>
                                            <th scope="row">{{ $sl++ }}</th>
                                            <td>{{ $edu->title }}</td>
                                            <td>{{ $edu->sector }}</td>
                                            <td>{{ $edu->time }}</td>
                                            <td>{{ $edu->description }}</td>
                                            <td>
                                                <a title="Edit" id="bootModalShow"
                                                    href="{{ route('educations.edit', $edu) }}"
                                                    class="btn btn-warning btn-sm"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <form id="{{ 'deleteForm_' . $edu->id }}" title="Delete"
                                                    action="{{ route('educations.destroy', $edu) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $edu->id }}"
                                                        class="delete btn btn-danger btn-sm" type="button"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <p> {{ $educations->links() }}</p>
                            </div>
                        </div>
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
                let dialog = '';

                // Show modal on button click
                $(document).off('click', '#bootModalShow').on('click', '#bootModalShow', function(e) {
                    e.preventDefault();


                    let modalContentUrl = $(this).attr('href');
                    let modalTitle = $(this).attr('title');

                    // AJAX call to load modal content
                    $.ajax({
                        type: "GET",
                        url: modalContentUrl,
                        beforeSend: function() {
                            showSpinner(); // Show the spinner before the request starts
                        },
                        success: function(response) {
                            dialog = bootbox.dialog({
                                title: `<h4>${modalTitle} Education Info</h4>`,
                                message: "<div class='modalContent'></div>",
                                size: 'medium',
                            });

                            // Inject the response into the modal content
                            $('.modalContent').html(response);
                        },
                        complete: function() {
                            hideSpinner(); // Hide the spinner when the request completes
                        }
                    });
                });

                // Store or Update data on form submission
                $(document).off('submit', '#storeAndUpdateForm').on('submit', '#storeAndUpdateForm', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    let formUrl = $(this).attr('action');

                    $.ajax({
                        type: "POST",
                        url: formUrl,
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            showSpinner(); // Show the spinner before the request starts
                        },
                        success: function(response) {
                            if (response.status == 400) {
                                // Handle validation errors
                                $('.errors').html('').removeClass('d-none');
                                $('.titleError').text(response.errors.title);
                                $('.sectorError').text(response.errors.sector);
                                $('.descriptionError').text(response.errors.description);
                                $('.timeError').text(response.errors.time);
                            } else if (response.status == 200) {
                                $('.errors').html('').addClass('d-none');
                                $('#table-content').load(location.href + ' #table-content');
                                dialog.modal('hide');

                                // Display SweetAlert for success
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
                        },
                        complete: function() {
                            hideSpinner(); // Hide the spinner when the request completes
                        }
                    });
                });

                // Delete AJAX request
                $(document).on('click', '.delete', function(e) {
                    let id = $(this).attr('data-id');
                    let formId = `deleteForm_${id}`;
                    let formAction = $(`#${formId}`).attr('action');
                    let scrollTop = $(window).scrollTop(); // Save scroll position

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


                            $.ajax({
                                type: "POST", // POST since Laravel uses _method for DELETE
                                url: formAction,
                                data: {
                                    _method: 'DELETE',
                                    _token: $('meta[name="csrf-token"]').attr(
                                        'content') // Include CSRF token
                                },
                                beforeSend: function() {
                                    showSpinner
                                        (); // Show the spinner before the request starts
                                },
                                success: function(response) {
                                    if (response.status === '200') {
                                        $('#table-content').load(location.href +
                                            ' #table-content',
                                            function() {
                                                $(window).scrollTop(
                                                    scrollTop
                                                ); // Restore scroll position
                                            });

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
                                },
                                complete: function() {
                                    hideSpinner();
                                }
                            });
                        }
                    });
                });

                //spinner
                function showSpinner() {
                    $('#spinner-overlay').show();
                }
                function hideSpinner() {
                    $('#spinner-overlay').hide();
                }

            });
        </script>
    @endpush
@endsection

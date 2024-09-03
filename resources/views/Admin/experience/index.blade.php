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
                                    $start = $experiences->firstItem();
                                    $end = $experiences->lastItem();
                                    $total = $experiences->total();
                                @endphp
                                <h3>Experiences</h3>
                                <span class="text-info">Showing {{ $start }} to {{ $end }} of
                                    {{ $total }} entries</span>
                            </div>
                            <div>
                                <a title="Create" href="{{ route('experiences.create') }}"
                                    class="bootModalShow btn btn-success">Add
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
                                        <th scope="col">Experience Type</th>
                                        <th scope="col">Institute</th>
                                        <th scope="col">Years of Experience</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sl = 1;
                                    @endphp

                                    @forelse ($experiences as $exp)
                                        <tr>
                                            <th scope="row">{{ $sl++ }}</th>
                                            <td>{{ $exp->title }}</td>
                                            <td>{{ $exp->sector }}</td>
                                            <td>{{ $exp->time }}</td>
                                            <td>{{ $exp->description }}</td>
                                            <td>
                                                <a href="{{ route('experiences.edit', $exp) }}"
                                                    class="bootModalShow btn btn-warning btn-sm"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <form id="{{ 'deleteForm_' . $exp->id }}" title="Delete"
                                                    action="{{ route('experiences.destroy', $exp) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $exp->id }}"
                                                        class="delete btn btn-danger
                                                        btn-sm"
                                                        type="button"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <p> {{ $experiences->links() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="spinner" style="display: none;">
        <div class="loadingio-spinner">
            <!-- Load the external SVG from assets -->
            <img src="{{ asset('loading/Interwind@1x-1.0s-200px-200px.svg') }}" alt="Loading Spinner" width="200"
                height="200">
        </div>
    </div>

    @push('css')
        <style>
            #spinner {
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
                // Show Modal on Click
                let dialog = '';

                $(document).off('click', '.bootModalShow').on('click', '.bootModalShow', function(e) {
                    e.preventDefault();

                    let modalContentUrl = $(this).attr('href');
                    let modalTitle = $(this).attr('title');

                    // Ajax call to load modal content
                    $.ajax({
                        type: "GET",
                        url: modalContentUrl,
                        beforeSend: function() {
                            $('#spinner').show();
                        },
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
                            $('#spinner').hide(); // Hide the spinner when the request completes
                        }
                    });
                });

                // Store or Update On form Submission
                $(document).off('submit', '.storeAndUpdateForm').on('submit', '.storeAndUpdateForm', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    let formUrl = $(this).attr('action');

                    $.ajax({
                        type: "POST",
                        url: formUrl,
                        data: formData,
                        processData: false, // Required for FormData
                        contentType: false, // Required for FormData
                        beforeSend: function() {
                            $('#spinner').show();
                        },
                        success: function(response) {
                            if (response.status == 400) {
                                // handle validation Error
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
                            $('#spinner').hide(); // Hide the spinner when the request completes
                        }
                    });
                });

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
                            $.ajax({
                                type: "DELETE",
                                url: formAction,
                                beforeSend: function() {
                                    $('#spinner').show();
                                },
                                success: function(response) {
                                    if (response.status == '200') {
                                        $('#table-content').load(location.href +
                                            ' #table-content');

                                        // Show success message
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
                                    $('#spinner').hide();
                                }
                            });
                        }
                    });
                });


            });
        </script>
    @endpush
@endsection

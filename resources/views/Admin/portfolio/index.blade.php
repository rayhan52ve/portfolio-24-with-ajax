@extends('Admin.partials.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <!-- Displaying the range of entries -->
                            <h3>Project List</h3>


                            <a title="Create" href="{{ route('portfolios.create') }}"
                                class="bootModalShow btn btn-success btn-loading">Add
                                Project</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="table-content" class="table-responsive">
                            <table id="DataTbl" class="table table-striped text-center" style="font-size: 13px">
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
                                                <a class="bootModalViewImage" title="{{ $portfolio->title }} Image View"
                                                    href="{{ asset($portfolio->image) }}">
                                                    <img src="{{ asset($portfolio->image) }}" width="75px"
                                                        class="img-thumbnail">
                                                </a>
                                            </td>
                                            <td>
                                                <a title="Edit" href="{{ route('portfolios.edit', $portfolio) }}"
                                                    class="bootModalShow btn btn-warning btn-sm btn-loading"><i
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

                // Show Modals on Click
                let dialog = '';

                // Create And Edit Modal
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
                            $('#spinner').hide();
                        }
                    });
                });

                // Image Show modal
                $(document).off('click', '.bootModalViewImage').on('click', '.bootModalViewImage', function(e) {
                    e.preventDefault();

                    let imageUrl = $(this).attr('href');
                    let modalTitle = $(this).attr('title');

                    // Open the modal with the image content
                    dialog = bootbox.dialog({
                        title: `<h4>${modalTitle}</h4>`,
                        message: `<img src="${imageUrl}" class="img-fluid" alt="${modalTitle}">`,
                        size: 'large',
                    });
                });

                // Form Image preview
                $(document).on('change', '.image', function(e) {
                    e.preventDefault();

                    const file = this.files[0];

                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            $('.preview_image').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(file);
                    }
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
                                dialog.modal('hide');
                                // Reload table content
                                $('#table-content').load(location.href + ' #table-content',
                                    function() {
                                        // Reinitialize DataTable after content is loaded
                                        $('#DataTbl').DataTable()
                                            .destroy(); // Destroy previous instance
                                        initializeDataTable(); // Reinitialize DataTable
                                    });

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
                            $('#spinner').hide();
                        }
                    });
                });

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

                            $.ajax({
                                type: "DELETE",
                                url: formAction,
                                // data: {
                                //     _method: 'DELETE',
                                // },
                                beforeSend: function() {
                                    $('#spinner').show();
                                },
                                success: function(response) {
                                    if (response.status == '200') {
                                        // Reload table content
                                        $('#table-content').load(location.href +
                                            ' #table-content',
                                            function() {
                                                // Reinitialize DataTable after content is loaded
                                                $('#DataTbl').DataTable().destroy();
                                                initializeDataTable();
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
                                    $('#spinner').hide();
                                }
                            });
                        }
                    });
                });

                // Datatable
                initializeDataTable();

                function initializeDataTable() {
                    $('#DataTbl').DataTable({
                        "paging": true,
                        "pageLength": 10,
                        "lengthMenu": [
                            [10, 25, 50, 100, -1],
                            [10, 25, 50, 100, "All"]
                        ],
                        "ordering": true,
                        "searching": true,
                        "info": true,
                        "autoWidth": true,
                        "responsive": true
                    });
                }

            });
        </script>
    @endpush
@endsection

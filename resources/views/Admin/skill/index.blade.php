@extends('Admin.partials.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="table-content" class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <!-- Displaying the range of entries -->
                            <div class="">
                                @php
                                    $start = $skills->firstItem();
                                    $end = $skills->lastItem();
                                    $total = $skills->total();
                                @endphp
                                <h3>Skill Info</h3>
                                <span class="text-info">Showing {{ $start }} to {{ $end }} of
                                    {{ $total }} entries</span>
                            </div>
                            <div>
                                <a id="bootModalShow" title="Create" href="{{ route('skils.create') }}"
                                    class="btn btn-success">Add
                                    New Skill</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Program</th>
                                        <th>Percentage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $sl = 1;
                                    @endphp
                                    @foreach ($skills as $skill)
                                        <tr>
                                            <td>{{ $sl++ }}</td>
                                            <td>{{ $skill->program }}</td>
                                            <td>{{ $skill->percentage }}</td>
                                            <td>
                                                <a id="bootModalShow" href="{{ route('skils.edit', $skill) }}"
                                                    class="btn btn-warning btn-sm"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>

                                                <form id="deleteForm_{{ $skill->id }}"
                                                    action="{{ route('skils.destroy', $skill) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $skill->id }}"
                                                        class="delete btn btn-danger btn-sm" type="button"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <p> {{ $skills->links() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {

                // Show Modal on Click
                let dialog = '';
                $(document).off('click', '#bootModalShow').on('click', '#bootModalShow', function(e) {
                    e.preventDefault();

                    let modalCintentUrl = $(this).attr('href');
                    let modalTitle = $(this).attr('title');

                    // Ajax Call to Load Modal Content
                    $.ajax({
                        type: "GET",
                        url: modalCintentUrl,
                        success: function(response) {
                            dialog = bootbox.dialog({
                                title: `<h4>${modalTitle} Experience Info</h4>`,
                                message: "<div class='modalContent'></div>",
                                size: 'medium',
                            });
                            // Inject response into Modal Content
                            $('.modalContent').html(response);

                        }
                    });
                });

                // Store or Update On Click
                $(document).off('click', '.submit').on('click', '.submit', function(e) {
                    e.preventDefault();

                    let formId = document.getElementById('storeAndUpdateForm');
                    let formData = new FormData(formId);
                    let formUrl = $('#storeAndUpdateForm').attr('action');

                    $.ajax({
                        type: "POST",
                        url: formUrl,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 400) {
                                // handle validation Error
                                $('.errors').html('').removeClass('d-none');
                                $('.programError').text(response.errors.program);
                                $('.percentageError').text(response.errors.percentage);
                            } else if (response.status == 200) {
                                $('.errors').html('').addClass('d-none');
                                $('#table-content').load(location.href + ' #table-content');
                                dialog.modal('hide');

                                // Display SweetAlert for success
                                Swal.fire({
                                    position: 'top-end',
                                    icon: response.icon,
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

                });

                // Delete Ajax Request
                $(document).off('click', '.delete').on('click', '.delete', function(e) {
                    e.preventDefault();

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
                                type: "POST",
                                url: formAction,
                                data: {
                                    _method: 'DELETE',
                                    _token: $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    $('#table-content').load(location.href +
                                        ' #table-content');

                                    // Show success message
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: response.msg,
                                        icon: response.icon,
                                        showConfirmButton: true,
                                        timerProgressBar: true,
                                        timer: 5000,
                                    });
                                }
                            });

                        }
                    });

                });


            });
        </script>
    @endpush
@endsection

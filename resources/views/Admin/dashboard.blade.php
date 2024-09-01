@extends('Admin.partials.master')

@section('content')

    <!-- Stats Start -->
    <div class="row">
        <div class="col-12">
            <div class="mb-5">
                <div class="row g-2">
                    <!-- Total Visitors -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="dollar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Visitors
                                </div>
                                <div class="text-primary cta-4">{{ $totalVisitors }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Yearly Visits -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="server" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25 text-center">
                                    Yearly Visits ({{ $thisYear }})
                                </div>
                                <div class="text-primary cta-4">{{ $yearlyVisitors }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Total Visitors -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="calendar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25 text-center">
                                    Monthly Total Visitors ({{ $thisMonthName }})
                                </div>
                                <div class="text-primary cta-4">{{ $monthlyVisitors }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Daily Total Visitors -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="calendar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25 text-center">
                                    Todays Visitors ({{ \Carbon\Carbon::now()->format('d M') }})
                                </div>
                                <div class="text-primary cta-4">{{ $dailyVisitors }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- COMPUTER -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="message" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">COMPUTER
                                    VISITS
                                </div>
                                <div class="text-primary cta-4">
                                    {{ $computerVisits }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MOBILE -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="message" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">
                                    MOBILE VISITS</div>
                                <div class="text-primary cta-4">
                                    {{ $mobileVisits }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="overflow:auto">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Visitors Info</h3>
                            @if ($visitors->count() > 0)
                                <a id="emptyTableBtn" href="{{ route('emptyVisitors') }}" class="btn btn-danger">Empty
                                    Table</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="DataTbl" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Device</th>
                                    <th scope="col">Browser</th>
                                    <th scope="col">Referer</th>
                                    <th scope="col">Home</th>
                                    <th scope="col">About</th>
                                    <th scope="col">Projects</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">First Visit</th>
                                    <th scope="col">Last Visit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                @endphp
                                @forelse ($visitors as $item)
                                    <tr>
                                        <td scope="row">{{ $sl++ }}</td>
                                        <td>{{ $item->ip_address }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->device }}</td>
                                        <td>{{ $item->browser }}</td>
                                        <td><a href=" {{ $item->referer }}"> {{ $item->referer }}</a></td>
                                        <td>{{ $item->home_page }}</td>
                                        <td>{{ $item->about_page }}</td>
                                        <td>{{ $item->project_page }}</td>
                                        <td>{{ $item->contact_page }}</td>
                                        <td>{{ $item->created_at->toDayDateTimeString() }}</td>
                                        <td>{{ $item->created_at != $item->updated_at ? $item->updated_at->toDayDateTimeString() : 'Not Updated' }}
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
        @if (session()->has('msg'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: true,
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 8000,
                    showCloseButton: true
                })
            </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#DataTbl').DataTable({
                    "paging": true,
                    "pageLength": 10,
                    "lengthMenu": [10, 25, 50, 100],
                    "ordering": true,
                    "searching": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true
                });

                $(document).off('click', '#emptyTableBtn').on('click', '#emptyTableBtn', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, empty it!"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            // Redirect to the route
                            url = $(this).attr('href');

                            $.ajax({
                                type: "GET",
                                url: url,
                                beforeSend: function() {
                                    $('#spinner-overlay').show();
                                },
                                success: function(response) {

                                    if (response.status == 200) {
                                        // Success response, show success message
                                        Swal.fire({
                                            position: 'center',
                                            icon: response.cls,
                                            toast: false,
                                            title: 'Info',
                                            text: response.msg,
                                            showConfirmButton: true,
                                            timerProgressBar: true,
                                            timer: 50000,
                                            showCloseButton: false
                                        });

                                        // Clear the DataTable (or reload it)
                                        $('#DataTbl').DataTable().clear().draw();

                                    } else if (response.status == 400) {
                                        // No data found, show an error message
                                        Swal.fire({
                                            position: 'center',
                                            icon: response.cls,
                                            toast: false,
                                            title: 'Table Empty',
                                            text: response.msg,
                                            showConfirmButton: true,
                                            timerProgressBar: true,
                                            timer: 50000,
                                            showCloseButton: false
                                        });

                                        // Also clear the DataTable in case it's already populated
                                        $('#DataTbl').DataTable().clear().draw();
                                    }


                                },
                                complete: function() {
                                    $('#spinner-overlay').hide();
                                }
                            });

                        }
                    });
                });

            });
        </script>
    @endpush
@endsection

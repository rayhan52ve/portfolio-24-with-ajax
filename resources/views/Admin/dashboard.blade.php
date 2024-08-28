@extends('Admin.partials.master')

@section('content')

    <!-- Stats Start -->
    <div class="row">
        <div class="col-12">
            <div class="mb-5">
                <div class="row g-2">
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="dollar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Visitors
                                </div>
                                <div class="text-primary cta-4">{{ $visitors->count() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="cart" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">HOME</div>
                                <div class="text-primary cta-4">{{ $visitors->sum('home_page') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="server" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">ABOUT PAGE
                                </div>
                                <div class="text-primary cta-4">{{ $visitors->sum('about_page') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="user" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">PROJECTS PAGE
                                </div>
                                <div class="text-primary cta-4">{{ $visitors->sum('project_page') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="arrow-top-left" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">CONTACT PAGE
                                </div>
                                <div class="text-primary cta-4">{{ $visitors->sum('contact_page') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="message" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">COMPUTER | MOBILE
                                </div>
                                <div class="text-primary cta-4">{{ $visitors->where('device','Computer')->count() }} - {{ $visitors->where('device','Mobile')->count() }}</div>
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
                        <a href="{{route('emptyVisitors')}}" class="btn btn-danger" onclick="return confirm('Are you sure?All visitors data willbe Deleted.')">Empty Table</a>
                    </div>
                    </div>
                    <div class="card-body">
                        @if (session('msg'))
                            <div class="alert alert-{{ session('cls') }} alert-dismissible fade show" role="alert">
                                {{ session('msg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
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

    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>    
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
        });
    </script>
@endsection

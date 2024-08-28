@extends('Admin.partials.master')
@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="overflow:auto">
                    <div class="card-header">
                        <h3>Project Info</h3>
                    </div>
                    <div class="card-body">
                        @if (session('msg'))
                            <div class="alert alert-{{ session('cls') }} alert-dismissible fade show" role="alert">
                                {{ session('msg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-striped">
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
                                            <img src="{{ asset($portfolio->image) }}" width="100px" height="70px"
                                                class="thumbnail align-scenter">
                                        </td>
                                        <td>
                                            <a href="{{ route('portfolios.edit', $portfolio) }}"
                                                class="btn btn-warning btn-sm"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>

                                            <form action="{{ route('portfolios.destroy', $portfolio) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"><i
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
@endsection

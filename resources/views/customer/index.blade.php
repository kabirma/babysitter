@extends('layout.app')

@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">{{ $title }}</h2>
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <i class="fa fa-check"></i> {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger text-center">
                    <i class="fa fa-times"></i> {{ Session::get('error') }}
                </div>
            @endif

            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-header block-header-default">

                    <div class="container row">
                        <div class="col-md-8">
                            <h3 class="block-title">{{ $title }} <small>View</small></h3>
                        </div>
                        <div class="col-md-4 text-right">



                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="table">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>BIO</th>
                                <th>Service</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->bio }}</td>
                                    <td>{{ $row->service == 1 ? 'Baby Sitter' : 'Carer' }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button
                                                class="btn @if ($row->status == 1) btn-alt-success @else btn-alt-danger @endif dropdown-toggle"
                                                type="button" data-toggle="dropdown"
                                                style="text-transform: capitalize">{{ $row->status == 1 ? 'Active' : 'Disabled' }}
                                                <span class="caret"></span></button>

                                            <ul class="dropdown-menu">
                                                <li><a class="text-success"
                                                        href="{{ route('userstatus', [$row->id, 1]) }}">
                                                        <i class="fa fa-check"></i> Active</a></li>
                                                <li><a class="text-danger" href="{{ route('userstatus', [$row->id, 0]) }}">
                                                        <i class="fa fa-times"></i> Deactive</a></li>
                                            </ul>

                                        </div>
                                    </td>

                                    <td>

                                        @if (Auth::guard('admin')->user()->role == 'admin')
                                            <button type="button" class="btn btn-sm btn-secondary delete"
                                                data-title="{{ $row->first_name }}"
                                                data-href="{{ route('customerdelete', $row->id) }}" data-toggle="modal"
                                                data-target="#modal-slideup" title="Delete {{ $title }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->



        </div>
        <!-- END Page Content -->
    </main>
@endsection

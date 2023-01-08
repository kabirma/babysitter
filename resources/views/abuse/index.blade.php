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
                                <th>Reported By</th>
                                <th>Reported</th>

                                <th>Date</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abuses as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->creator->first_name }}</td>
                                    <td>{{ $row->reporter->first_name }}</td>
                                    <td>{{ $row->comment }}</td>

                                    <td>{{ date('M,j Y', strtotime($row->created_at)) }}</td>

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

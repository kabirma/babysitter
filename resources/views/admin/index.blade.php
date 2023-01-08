@extends('layout.app')

@section('content')
    
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">{{$title}}</h2>
        @if(Session::has('success'))
        <div class="alert alert-success text-center">
            <i class="fa fa-check"></i> {{ Session::get('success') }}
        </div>
        @endif

        @if(Session::has('error'))  
        <div class="alert alert-danger text-center">
            <i class="fa fa-times"></i> {{ Session::get('error') }}
        </div>
        @endif

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                
                <div class="container row">
                    <div class="col-md-8">
                        <h3 class="block-title">{{$title}} <small>View</small></h3>
                    </div>
                    <div class="col-md-4 text-right">
                       
                        @if(Auth::guard('admin')->user()->role=="admin")
                        <a href="{{route('adminadd')}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Add {{$title}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="table">
                    <thead>
                        <tr>
                            <th>S/No</th>
                            <th>Email</th>
                            <th>Password</th>
                           
                            <th>Role</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $key=>$row)
                      
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->pin}}</td>
                            <td>{{$row->role=="staff" ? "Admin" : "Super Admin"}}</td>
                            
                            <td>
                                @if(Auth::guard('admin')->user()->role=="admin")
                                <a href="{{route('adminedit',$row->id)}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit {{$title}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endif

                                @if(Auth::guard('admin')->user()->role=="admin")
                                <button type="button" class="btn btn-sm btn-secondary delete" data-title="{{$row->username}}" data-href="{{route('admindelete',$row->id)}}" data-toggle="modal" data-target="#modal-slideup" title="Delete {{$title}}">
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
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
                       
                    
                        <a href="{{route('testimonialadd')}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Add {{$title}}">
                            <i class="fa fa-plus"></i>
                        </a>
                     
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
                            <th>Rating</th>
                            
                         
                            <th>Date</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $key=>$row)
                        @php
                            $admin=App\Admin::find($row->admin_id);
                          
                        @endphp
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star" @if($i<$row->rating) style="color:gold" @endif></i>
                            @endfor    
                            </td>
                            
                           
                            <td>{{date('M,j Y',strtotime($row->created_at))}}</td>
                            <td>
                                @if(Auth::guard('admin')->user()->role=="admin")
                                <a href="{{route('testimonialedit',$row->id)}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit {{$title}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endif

                                @if(Auth::guard('admin')->user()->role=="admin")
                                <button type="button" class="btn btn-sm btn-secondary delete" data-title="{{$row->name}} Testimonial" data-href="{{route('testimonialdelete',$row->id)}}" data-toggle="modal" data-target="#modal-slideup" title="Delete {{$title}}">
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
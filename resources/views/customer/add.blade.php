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
                        <h3 class="block-title">{{$title}} <small>@if(isset($customers)) Edit @else Add @endif</small></h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{route('customerview')}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View {{$title}}">
                            <i class="fa fa-list"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                
                <form method="post" @if(isset($customers)) action="{{route('customerupdate')}}" @else action="{{route('customercreate')}}"  @endif>
                
                    @csrf
                    @if(isset($customers))
                    <input type="hidden" name="id" value="{{$customers->id}}">
                    <input type="hidden" name="status" value="{{$customers->status}}">
                    @endif
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} First Name</label>
                        <input type="text" class="form-control" required @if(isset($customers)) value="{{$customers->first_name}}" @endif name="first_name" placeholder="Enter First Name..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Last Name</label>
                        <input type="text" class="form-control" required @if(isset($customers)) value="{{$customers->last_name}}" @endif name="last_name" placeholder="Enter Last Name..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Email</label>
                        <input type="text" class="form-control" required @if(isset($customers)) value="{{$customers->email}}" @endif name="email" placeholder="Enter Email..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Password</label>
                        <input type="text" class="form-control" required @if(isset($customers)) value="{{$customers->pin}}" @endif name="password" placeholder="Enter Password..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Phone</label>
                        <input type="text" class="form-control" required @if(isset($customers)) value="{{$customers->phone}}" @endif name="phone" placeholder="Enter Phone..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Address</label>
                        <input type="text" class="form-control" required @if(isset($customers)) value="{{$customers->address}}" @endif name="address" placeholder="Enter Address..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Country</label>
                        <input type="text" class="form-control" required @if(isset($customers)) value="{{$customers->country}}" @endif name="country" placeholder="Enter Country..">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-alt-primary"> @if(isset($customers)) Update @else Create @endif</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

      

    </div>
    <!-- END Page Content -->
</main>

@endsection
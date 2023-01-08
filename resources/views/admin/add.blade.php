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
                        <h3 class="block-title">{{$title}} <small>@if(isset($admins)) Edit @else Add @endif</small></h3>
                    </div>
                    <div class="col-md-4 text-right">
                        
                        
                        <a href="{{route('adminview')}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View {{$title}}">
                            <i class="fa fa-list"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                
                <form method="post" @if(isset($admins)) action="{{route('adminupdate')}}" @else action="{{route('admincreate')}}"  @endif>
                
                    @csrf
                    @if(isset($admins))
                    <input type="hidden" name="id" value="{{$admins->id}}">
                    @endif
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Name</label>
                        <input type="text" class="form-control" required @if(isset($admins)) value="{{$admins->username}}" @endif name="name" placeholder="Enter Name..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Email</label>
                        <input type="text" class="form-control" required @if(isset($admins)) value="{{$admins->email}}" @endif name="email" placeholder="Enter Email..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Password</label>
                        <input type="text" class="form-control" required @if(isset($admins)) value="{{$admins->pin}}" @endif name="password" placeholder="Enter Password..">
                    </div>
                    @if(isset($admins))
                    <input type="hidden" name="role" value="{{$admins->role}}">
                    @else
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Role</label>
                        <select name="role" id="role_id" required class="form-control">
                            <option selected disabled>Select {{$title}} Role</option>
                            <option value="admin" @if(isset($admins)) @if($admins->role=="admin") selected @else @endif  @endif>Super Admin</option>
                            <option value="staff" @if(isset($admins)) @if($admins->role=="staff") selected @else @endif  @endif>Admin</option>
                        </select>
                    </div>
                    @endif
                    


                   
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-alt-primary"> @if(isset($admins)) Update @else Create @endif</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

      

    </div>
    <!-- END Page Content -->
</main>

@endsection
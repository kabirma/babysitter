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
                        <h3 class="block-title">{{$title}} <small>@if(isset($testimonials)) Edit @else Add @endif</small></h3>
                    </div>
                    <div class="col-md-4 text-right">
                        
                        
                        <a href="{{route('testimonialview')}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View {{$title}}">
                            <i class="fa fa-list"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                
                <form method="post" @if(isset($testimonials)) action="{{route('testimonialupdate')}}" @else action="{{route('testimonialcreate')}}"  @endif enctype="multipart/form-data">
                
                    @csrf
                    @if(isset($testimonials))
                    <input type="hidden" name="id" value="{{$testimonials->id}}">
                    @endif
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Name</label>
                        <input type="text" class="form-control" required @if(isset($testimonials)) value="{{$testimonials->name}}" @endif name="name" placeholder="Enter Name..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Email</label>
                        <input type="email" class="form-control" required @if(isset($testimonials)) value="{{$testimonials->email}}" @endif name="email" placeholder="Enter Email..">
                    </div>
               
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Rating</label>
                        <input type="number" min="0" class="form-control" required @if(isset($testimonials)) value="{{$testimonials->rating}}" @endif name="rating" placeholder="Enter Rating..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Review</label>
                        <textarea name="review" class="form-control" id="ckeditor" placeholder="Enter Review.." required cols="30" rows="10">@if(isset($testimonials)){{$testimonials->review}}@endif</textarea>
                        
                    </div>
               

                   
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-alt-primary"> @if(isset($testimonials)) Update @else Create @endif</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

      

    </div>
    <!-- END Page Content -->
</main>

@endsection
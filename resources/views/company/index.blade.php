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
                        <h3 class="block-title">{{$title}} <small>@if(isset($companies)) Edit @else Add @endif</small></h3>
                    </div>
                    <div class="col-md-4 text-right">
                     
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                
                <form method="post" action="{{route('companyupdate')}}" enctype="multipart/form-data">
                
                    @csrf
                    @if(isset($companies))
                    <input type="hidden" name="id" value="{{$companies->id}}">
                    @endif
                    @if($type=="main")
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Name</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->name}}" @endif name="name" placeholder="Enter Name..">
                    </div>
                    
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Email</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->email}}" @endif name="email" placeholder="Enter Email..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Phone</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->phone}}" @endif name="phone" placeholder="Enter Phone..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Address</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->location}}" @endif name="address" placeholder="Enter Address..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">Map Radius (In KM)</label>
                        <input type="number" class="form-control" required @if(isset($companies)) value="{{$companies->map_radius}}" @endif name="map_radius" placeholder="Enter Frieght..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Short Description (Max 150 Characters)</label>
                        <textarea name="short_desc" maxlength="150" required cols="30" rows="1" class="form-control">{{$companies->short_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        
                        <label for="example-nf-email">{{$title}} Facebook</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->facebook}}" @endif name="facebook" placeholder="Enter Facebook..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Twitter</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->linkedin}}" @endif name="linkedin" placeholder="Enter Twitter..">
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Instagram</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->instagram}}" @endif name="instagram" placeholder="Enter Instagram..">
                    </div>

                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Meta Title</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->meta_title}}" @endif name="meta_title" placeholder="Enter Meta Title..">
                    </div>

                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Meta Keywords</label>
                        <input type="text" class="form-control" required @if(isset($companies)) value="{{$companies->meta_keyword}}" @endif name="meta_keyword" placeholder="Enter Meta Keywords..">
                    </div>

                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Meta Description (Max 150 Characters)</label>
                        <textarea name="meta_description" maxlength="150" required cols="30" rows="1" class="form-control">{{$companies->meta_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input js-custom-file-input-enabled" id="example-supportfile-input-custom" name="logo" data-toggle="custom-file-input">
                                <label class="custom-file-label" for="example-file-supportfile-custom">Choose {{$title}} Logo</label>
                        </div>
                        <div style="padding:2%" class="text-center">
                            <img src="{{asset($companies->logo)}}" alt="Favicon" style="height:200px;width:auto">   
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Favicon</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input js-custom-file-input-enabled" id="example-file-input-custom" name="favicon" data-toggle="custom-file-input">
                                <label class="custom-file-label" for="example-file-file-custom">Choose {{$title}} Fav-icon</label>
                        </div>  
                        <div style="padding:2%" class="text-center">
                            <img src="{{asset($companies->favicon)}}" alt="Favicon" style="height:200px;width:auto">   
                        </div>
                    </div>
                    @endif
                    @if($type=="about")
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Heading</label>
                            <input type="text" class="form-control" required  @if(isset($companies)) value="{{$companies->about_title}}" @endif name="about_title" placeholder="Enter Heading..">
                        </div>
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Content</label>
                            <textarea name="about"  required cols="30" rows="10" class="form-control">{{$companies->about}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled" id="example-supportfile-input-custom" name="about_image" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="example-file-supportfile-custom">Choose {{$title}} Image</label>
                            </div>
                            <div style="padding:2%" class="text-center">
                                <img src="{{asset($companies->about_image)}}" alt="about_image" style="height:200px;width:auto">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Mision (Max 400 Characters)</label>
                            <textarea name="mission" maxlength="400" required cols="30" rows="4" class="form-control">{{$companies->mission}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Vision (Max 400 Characters)</label>
                            <textarea name="vision" maxlength="400" required cols="30" rows="4" class="form-control">{{$companies->vision}}</textarea>
                        </div>
                    @endif
                    @if($type=="banner")
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Heading</label>
                            <input type="text" class="form-control" required  @if(isset($companies)) value="{{$companies->main_content}}" @endif name="main_content" placeholder="Enter Heading..">
                        </div>
                       
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled" id="example-supportfile-input-custom" name="main_image" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="example-file-supportfile-custom">Choose {{$title}} Image</label>
                            </div>
                            <div style="padding:2%" class="text-center">
                                <img src="{{asset($companies->main_image)}}" alt="main_image" style="height:200px;width:auto">   
                            </div>
                        </div>
                    @endif
                    @if($type=="why_us")
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Heading</label>
                            <input type="text" class="form-control" required  @if(isset($companies)) value="{{$companies->why_us}}" @endif name="why_us" placeholder="Enter Heading..">
                        </div>
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Content</label>
                            <textarea name="why_us_content"  required cols="30" rows="10" class="form-control ckeditor">{{$companies->why_us_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="example-nf-email">{{$title}} Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled" id="example-supportfile-input-custom" name="why_us_image" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="example-file-supportfile-custom">Choose {{$title}} Image</label>
                            </div>
                            <div style="padding:2%" class="text-center">
                                <img src="{{asset($companies->why_us_image)}}" alt="why_us_image" style="height:200px;width:auto">   
                            </div>
                        </div>
                    @endif
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-alt-primary"> @if(isset($companies)) Update @else Create @endif</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

      

    </div>
    <!-- END Page Content -->
</main>

@endsection 
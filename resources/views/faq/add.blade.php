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
                        <h3 class="block-title">{{$title}} <small>@if(isset($faqs)) Edit @else Add @endif</small></h3>
                    </div>
                    <div class="col-md-4 text-right">
                        
                        
                        <a href="{{route('faqview')}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View {{$title}}">
                            <i class="fa fa-list"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                
                <form method="post" @if(isset($faqs)) action="{{route('faqupdate')}}" @else action="{{route('faqcreate')}}"  @endif enctype="multipart/form-data">
                
                    @csrf
                    @if(isset($faqs))
                    <input type="hidden" name="id" value="{{$faqs->id}}">
                    @endif
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Question</label>
                        <textarea name="question" class="form-control" placeholder="Enter Question.." required cols="30" rows="10">@if(isset($faqs)){{$faqs->question}}@endif</textarea>                    </div>
                    <div class="form-group">
                        <label for="example-nf-email">{{$title}} Answer</label>
                        <textarea name="answer" class="form-control" id="ckeditor" placeholder="Enter Answer.." required cols="30" rows="10">@if(isset($faqs)){{$faqs->answer}}@endif</textarea>
                    </div>

                   
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-alt-primary"> @if(isset($faqs)) Update @else Create @endif</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

      

    </div>
    <!-- END Page Content -->
</main>

@endsection
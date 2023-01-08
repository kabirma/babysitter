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
                            <h3 class="block-title">{{ $title }} <small>
                                    @if (isset($sliders))
                                        Edit
                                    @else
                                        Add
                                    @endif
                                </small></h3>
                        </div>
                        <div class="col-md-4 text-right">


                            <a href="{{ route('sliderview') }}" class="btn btn-sm btn-secondary" data-toggle="tooltip"
                                title="View {{ $title }}">
                                <i class="fa fa-list"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->

                    <form method="post"
                        @if (isset($sliders)) action="{{ route('sliderupdate') }}" @else action="{{ route('slidercreate') }}" @endif
                        enctype="multipart/form-data">

                        @csrf
                        @if (isset($sliders))
                            <input type="hidden" name="id" value="{{ $sliders->id }}">
                        @endif
                        <div class="form-group">
                            <label for="example-nf-email">{{ $title }} Title</label>
                            <input type="text" class="form-control" required
                                @if (isset($sliders)) value="{{ $sliders->heading }}" @endif name="heading"
                                placeholder="Enter Heading..">
                        </div>

                        <div class="form-group" style="display:none">
                            <label for="example-nf-email">{{ $title }} Link</label>
                            <input type="text" class="form-control" value="" name="description"
                                placeholder="Enter Link..">

                        </div>
                        <div class="form-group">
                            <label for="example-nf-email">{{ $title }} Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled"
                                    id="example-file-input-custom" name="image" data-toggle="custom-file-input">
                                <label class="custom-file-label" for="example-file-input-custom">Choose {{ $title }}
                                    Image</label>
                                @if(isset($sliders))
                                <hr>
                                <img src="{{asset($sliders->image)}}" style="height:120px">
                                @endif
                            </div>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="example-nf-email">{{ $title }} Mobile Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled"
                                    id="example-file-input-custom" name="mobileimage" data-toggle="custom-file-input">
                                <label class="custom-file-label" for="example-file-input-custom">Choose {{ $title }}
                                    Mobiel Image</label>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-alt-primary">
                                @if (isset($sliders))
                                    Update
                                @else
                                    Create
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Dynamic Table Full -->



        </div>
        <!-- END Page Content -->
    </main>
@endsection

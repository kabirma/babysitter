@extends('layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp
    
     <!-- Main Container -->
     <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12 text-center">
                    <img src="{{asset($company->logo)}}" alt="{{$company->name}}" style="height:200px">
                    <hr>
                </div>
                <div class="col-12 col-xl-6">
                    <a class="block block-link-shadow text-right" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10  d-sm-block">
                                <i class="fa fa-user fa-3x text-body-bg-dark"></i>
                            </div>
                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{App\Customer::where('type',1)->count()}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Offer</div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-xl-6">
                    <a class="block block-link-shadow text-right" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10  d-sm-block">
                                <i class="fa fa-child fa-3x text-body-bg-dark"></i>
                            </div>
                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{App\Customer::where('type',0)->count()}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Supplier</div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-xl-6">
                    <a class="block block-link-shadow text-right" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10  d-sm-block">
                                <i class="fa fa-times fa-3x text-body-bg-dark"></i>
                            </div>
                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{App\ReportAbuse::count()}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Report Abuse</div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-xl-6">
                    <a class="block block-link-shadow text-right" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10  d-sm-block">
                                <i class="fa fa-star fa-3x text-body-bg-dark"></i>
                            </div>
                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{App\Testimonial::count()}}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Customer Reviews</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection
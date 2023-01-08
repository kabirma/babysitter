@extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp



<section id="breadcrumb" class="space">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 breadcrumb-block">
                <h2>{{$service->title}}</h2>
            </div>
            <div class="col-sm-6 breadcrumb-block text-right">
                <ol class="breadcrumb">
                    <li><span>You are here:</span><a href="{{route('index')}}">Home</a></li>
                    <li class="active">Services</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section id="services" class="space bg">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="service-block col-sm-10">
                <div class="inner">
                    <div class="service-image text-center">
                        <img class="" src="{{asset($service->image)}}" style="" alt="service">
                        <a href="#" class="hover center"><i class="fa fa-link" aria-hidden="true"></i></a>
                    </div>
                    <div class="service-text">
                        <a href="#" target="_parent">
                            <h3 class="title">{{$service->title}}</h3>
                        </a>
                        <p>
                            <?=
                                $service->description
                                ?>
                        </p>
                        
                    </div>
                </div>
            </div>
        
           
        </div>
    </div>
</section>
@endsection
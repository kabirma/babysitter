@extends('front.layout.app')

@section('content')
@php
$company=App\Company::first();
@endphp 

<div class="page-title-area bg-19">
    <div class="container">
        <div class="page-title-content">
            <h2>Why Us</h2>
            <ul>
                <li>
                    <a href="{{route('index')}}">
                        Home
                    </a>
                </li>
                <li class="active">Why Us</li>
            </ul>
        </div>
    </div>
</div>
<section class="why-chose-us-area why-chose-us-area-three pt-100 pb-70" id="why_us" style="margin:4% 1%">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="choose-us-content">
                    <span class="top-title">Why Chose Us</span>
                    <h2>{{$company->why_us}}</h2>
                    <p>
                        <?= $company->why_us_content?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="choose-us-three">
                    <img src="{{asset($company->why_us_image)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
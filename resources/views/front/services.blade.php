@extends('front.layout.app')

@section('content')
    <!--=================================
            banner -->
    <section class="header-inner bg-dark text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Offers</li>
                    </ol>
                    <h2 class="inner-banner-title">Offers</h2>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                banner -->

    <!--=================================
            pricing-style-03 -->
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 10%">
                <div class="col-md-12">
                    <form class="row g-2 mt-4 align-items-center" method="POST" action="{{ route('search') }}">
                        @csrf
                        <div class="mb-3 mt-0 select-border col-md-4">
                            <select class="form-control" name="service">
                                <option value="1" @if (isset($service) && $service == 1) selected @else @endif>Babysitter or
                                    Nanny</option>
                                <option value="2" @if (isset($service) && $service == 2) selected @else @endif>Senior Care
                                    Sitter</option>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3 mt-0">
                            <input type="text" name="address"
                                value="@if (isset($address)) {{ $address }} @else Search City @endif"
                                required class="form-control" id="search_input">
                            <input type="hidden" name="latitude" id="latitude"
                                value="@if (isset($latitude)) {{ $latitude }} @else @endif">
                            <input type="hidden" name="longitude" id="longitude"
                                value="@if (isset($longitude)) {{ $longitude }} @else @endif">
                        </div>
                        <div class="mb-3 mt-0 col-sm-3 mb-0">
                            <button type="submit" class="btn btn-dark">I Find my next caregiver!</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <hr>
                        @if (isset($service))
                            <h2>{{ count($users) }} <b
                                    class="text-primary">{{ $service == 1 ? 'Babysitter' : 'Senior Care Sitter' }}</b> Found
                                in <b class="text-primary">{{ $address }}</b></h2>
                        @else
                            <h2>{{ count($users) }} Found</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if (count($users))
                        @foreach ($users as $user)
                            @php
                                $schedule=unserialize($user->schedule);
                                $placeholder="front/images/placeholder.png";
                                $profile_pic=is_null($user->image) ? $placeholder : $user->image;
                            @endphp
                            <div class="pricing-table-style-03">
                                <div class="pricing-table-title">
                                    <img src="{{asset($profile_pic)}}" style="width: 80%" alt="{{$user->first_name}}">
                                </div>
                                <div class="pricing-prize pricing-table-price">
                                    <h6>{{$user->first_name}} {{$user->last_name}}</h6>
                                    <p>
                                        {{$user->address}}
                                    </p>
                                    <p> {{$user->bio}}</p>
                                </div>
                                <div class="pricing-table-content">
                                   <table class="table table-stripped">
                                    <tr>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                    </tr>
                                    @foreach ($schedule as $key=>$item)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>{{$item['start_time']}}:00</td>
                                            <td>{{$item['end_time']}}:00</td>
                                        </tr>
                                    @endforeach
                                   </table>
                                </div>
                                <div class="pricing-table-button">
                                    <a href="#" class="btn btn-dark">Contact {{$user->service==1 ? "Babysitter" : "Senior Sitter"}}</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger">No Sitter Found</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--=================================
            pricing-style-03 -->
@endsection

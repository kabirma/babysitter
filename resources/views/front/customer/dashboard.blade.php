@extends('front.layout.app')

@section('content')
@include('front.customer.sidebar')
@php
    $company=App\Company::first();
@endphp
            {{-- <div class="col-sm-8 blog-base">
                <div class="col-sm-12 no-padding">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-responsive">
                        <thead style="background: #E74545;color:white">
                            <tr>
                                <th>S/No</th>
                            
                                <th>Vehicle</th>
                                <th>Pick UP</th>
                                <th>Drop Off</th>
    
                                <th>Miles</th>
                                <th>Quotation</th>
                               
                                <th>Comments</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Inquiry::where('customer_id',Auth::guard('customer')->user()->id)->get() as $key=>$row)
                            @php
                                $service=App\Service::find($row->service_id);
                            @endphp
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                    {{$service->title}}
                                </td>
                                <td>
                                    {{$row->pickup}}
                                </td>
                                <td>
                                    {{$row->dropoff}}
                                </td>
                                <td>
                                    {{number_format($row->miles,2)}} miles
                                </td>
                                <td>
                                    {{number_format($row->miles*$company->distance_charges,2)}} $
                                </td>
                              
                                <td>
                                    {{$row->comments}}
                                </td>
                                <td>
                                    <span class="badge badge-primary">
                                        {{$row->status}}
                                    </span>
                                </td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
            </div> --}}
        </div>
    </div>
</section>
@endsection
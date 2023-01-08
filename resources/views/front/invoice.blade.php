@extends('front.layout.app')

@section('content')
<style>
    .page-header .header-title{
        background-image:url("{{asset("track your status.jpg")}}") ,linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));;
        background-blend-mode: overlay;
        background-position-y: center;
    }
</style>
<style>
    .user-area-style .contact-form-action{
        max-width: 800px;
    }
    label{
        font-size:14px;
        margin-bottom:0px;
    }
    h5{
        margin-top:0px;
    }
</style>
<style>
    @charset "UTF-8";
@import "//fonts.googleapis.com/css?family=Open+Sans";
.steps {
  list-style: none;
  margin: 0;
  padding: 0;
  display: table;
  table-layout: fixed;
  width: 100%;
  color: #929292;
  height: 4rem;
  margin-top:3%;
}
.steps > .step {
  position: relative;
  display: table-cell;
  text-align: center;
  font-size: 2rem;
  color: #6D6875;
}
.steps > .step:before {
  content: attr(data-step);
  display: block;
  margin: 0 auto;
  background: #ffffff;
  border: 2px solid #e6e6e6;
  color: #e6e6e6;
  width: 4rem;
  height: 4rem;
  text-align: center;
  margin-bottom: -6.9rem;
  line-height: 3.9rem;
  border-radius: 100%;
  position: relative;
  z-index: 1;
  font-weight: 700;
  font-size: 2rem;
}
.steps > .step:after {
  content: "";
  position: absolute;
  display: block;
  background: #e6e6e6;
  width: 100%;
  height: 0.525rem;
top: 1.7rem;
  left: 50%;
}
.steps > .step:last-child:after {
  display: none;
}
.steps > .step.is-complete {
  color: #6D6875;
}
.steps > .step.is-complete:before {
  content: "✓";
  color: #C23F14;
  background: #fef0e2;
  border: 2px solid #C23F14;
}
.steps > .step.is-complete:after {
  background: #C23F14;
}
.steps > .step.is-active {
  color:#C23F14;
}
.steps > .step.is-active:before {
  color: #FFF;
  border: 2px solid #C23F14;
  background: #C23F14;
  margin-bottom: -6.9rem;
}
</style>
@php
    $company=App\Company::first();
@endphp
     <!--Page Header-->
     <div class="page-header title-area">
        <div class="header-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1 class="page-title">Track your Status</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 site-breadcrumb">
                        <nav class="breadcrumb">
                            <a class="home" href="#"><span>Home</span></a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span>Track your Status</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header end-->

<section id="services" class="space bg">
    <div class="container">
        <div class="contact-form-action">
           
      
          
                <div class="row">
                    <div class="col-md-12 row step" id="first">
                       
                        <div class="col-md-6 text-left">
                            <h2>Unique NO: {{$invoice->invoice_no}}</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <h2>Status: {{$invoice->status}}</h2>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <h4>Customer Information</h4>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Full Name</label>
                                <input class="form-control" required type="text" value="{{$invoice->first_name}}" name="first_name">
                            </div>
                        </div>
                      
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Email</label>
                                <input class="form-control" required type="text" value="{{$invoice->email}}" name="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Contact No.</label>
                                <input class="form-control" required type="text" value="{{$invoice->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Address</label>
                                <input class="form-control" required type="text" value="{{$invoice->address}}" name="address">
                            </div>
                        </div>
                      
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Country</label>
                                <input class="form-control" required type="text" value="{{$invoice->munipacility}}" name="munipacility">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Zip Code</label>
                                <input class="form-control" required type="text" value="{{$invoice->zip_code}}" name="zip_code">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Cargo Information</h4>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Item Description</label>
                                <input class="form-control" required type="text" value="{{$invoice->item_desc}}" name="item_desc">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Total No of Boxes</label>
                                <input class="form-control" required type="text" value="{{$invoice->qty}}" name="qty">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Estimated total cubic meters (CBM)</label>
                                <input class="form-control" required type="text" value="{{$invoice->cbm}}" name="cbm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Estimated kilograms (KGS.)</label>
                                <input class="form-control" required type="text" value="{{$invoice->kgs}}" name="kgs">
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-md-12 row step" id="second">
                        <div class="col-md-12">
                            <h4>Delivery Details</h4>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <label for="">Delivery TO</label>
                            <input class="form-control" required type="text" value="{{$invoice->deliver_to}}" name="freight_cost">
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                              
                                <label>{{($invoice->deliver_to=="Warehouose")?"Destination":"Delivery Address"}}</label>   
                                <input type="text" value="{{$invoice->pickup}}" class="form-control" required id="search_input" placeholder="Address" name="pickup" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label>{{($invoice->deliver_to=="Warehouose")?"Location":"Contact Person"}}</label>
                                <input placeholder="Address" class="form-control" required name="dropoff" type="text" value="{{$invoice->dropoff}}" value=""  id="search_input2" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="text-transform:capitalize">{{($invoice->deliver_to=="Warehouose")?"Total Local Freight Cost":"Contact Person Number"}}</label>
                                <input class="form-control" required type="text" value="{{$invoice->local_cost}}" name="local_cost">
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="container">
                <ol class="steps">
                    <li style="font-size:12px;" class="step @if($invoice->status=="Booking Created") is-complete @endif" data-step="1">
                      Booking Successfull
                    </li>
                    <li style="font-size:11px;" class="step @if($invoice->status=="Package Received") is-complete @endif" data-step="2">
                     Package Received
                    </li>
                    <li style="font-size:11px;" class="step @if($invoice->status=="In transit to Manila Port") is-complete @endif" data-step="3">
                    In transit to Manila Port
                    </li>
                    <li style="font-size:11px;" class="step @if($invoice->status=="In Customs") is-complete @endif" data-step="4">
                    In Customs
                      </li>
                      <li style="font-size:11px;" class="step @if($invoice->status=="In Transit to Designated Warehouse") is-complete @endif" data-step="6">
                      In Transit to Designated Warehouse / to your Door Step
                      </li>
                      <li style="font-size:11px;" class="step @if($invoice->status=="Ready for Pick Up") is-complete @endif" data-step="7">
                      Ready for Pick Up
                      </li>
                  </ol>
                  <hr>
                <table class="table-borderd table-stripped table">
                    <thead style="background: rgb(26, 29, 31);color:white">
                        <tr>
                            <th>S/NO.</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\QuoteLog::where('inquire_id',$invoice->id)->get() as $key=>$item)
                            
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br><br>

        </div>
    </div>
</section>

@endsection
@section('js')
    
<script>
    $('.container').find('.form-control').each(function() {
  $(this).replaceWith("<h5>" + this.value + "</h5>");
});
</script>
@endsection
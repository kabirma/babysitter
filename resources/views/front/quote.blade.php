@extends('front.layout.app')

@section('content')
<style>
    .user-area-style .contact-form-action{
        max-width: 800px;
    }
</style>
<style>
    .page-header .header-title{
        background-image:url("{{asset("book.jpg")}}"),linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));;
        background-blend-mode: overlay;
    }
   small {
    font-size: 70%!important;
}
.loader {
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid rgb(225, 26, 50);
  width: 50px;
  height: 50px;
  float:right;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
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
                        <h1 class="page-title">Book Your Shipment</h1>
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
                            <span>Book Your Shipment</span>
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
           
           
           
           
           
             <div class="alert alert-success text-center" style="display:none;" id="s">
                <i class="fa fa-check"></i> <span id="success"></span>
            </div>


            <form method="post" action="{{route('quotesubmit')}}" style="padding:2% 7%" id="formQuote">
                @csrf
                <div class="row">
                    <div class="col-md-12 row step" id="first">
                        <div class="col-md-12">
                            <h4>Customer Information</h4>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Full Name</label>
                                <input class="form-control" type="text" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Last Name</label>
                                <input class="form-control" value="nill" type="text" name="last_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Email Address</label>
                                <input class="form-control" type="text"  name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Contact Number</label>
                                <input class="form-control" type="text"  name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Address</label>
                                <input class="form-control" type="text"  name="address">
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <div class="form-group">
                                <label style="text-transform:capitalize">House/Lot/Block/Street</label>
                                <input class="form-control" value="nill"  type="text" name="house">
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Sub Division</label>
                                <input class="form-control"  type="text"  value="nill" name="subdivision">
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Province</label>
                                <input class="form-control" type="text"  value="nill" name="province">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Zip Code</label>
                                <input class="form-control" type="text"  name="zip_code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Country</label>
                                <input class="form-control" type="text"  name="munipacility">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Cargo Information</h4>
                            <hr>
                        </div>
                        <div class="col-md-6" style="margin-bottom:10px;">
                           <label class="form-check-label">
    <input type="radio" class="form-check-input" name="cargo" value="Sea Cargo" checked><span style="margin-left:5px;">Sea Cargo</span>
  </label>
                        </div>
                        
                         <div class="col-md-6" style="margin-bottom:10px;">
                           <label class="form-check-label">
    <input type="radio" class="form-check-input" name="cargo" value="Air Cargo"><span style="margin-left:5px;">Air Cargo</span>
  </label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Item Description</label>
                                <input class="form-control" type="text"  name="item_desc">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Total No of Boxes</label>
                                <input class="form-control" type="text"  name="qty">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Estimated total cubic meters (CBM)</label>
                                <input class="form-control" type="text"  name="cbm">
                                <small ><a href="#0" style="color:#C23F14;margin-left:1%">*Know Your CBM?</a></small>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Estimated kilograms (KGS.)</label>
                                <input class="form-control" type="text"  name="kgs">
                                <small ><a href="#0" style="color:#C23F14;margin-left:1%">*Is CBM>KGS?</a></small>
                               
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Total Number Of Boxes</label>
                                <input class="form-control" value="nill"  type="text" name="no_box">
                            </div>
                        </div>
                      
                        
                        <div class="col-md-12" style="display:none">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Total Freight Shipping Cost</label>
                                <input class="form-control" value="nill"  type="text" name="freight_cost">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 row step" id="second">
                        <div class="col-md-12">
                            <h4>Platform Voucher</h4>
                            <hr>
                            <div class="form-group">
                                <label style="text-transform:capitalize">Promo Code <span style="color:#6c757d; font-weight:200;">(Optional)</span> </label>
                                <input class="form-control" type="text" placeholder="Enter Promo Code" name="promo_code">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <h4>Delivery Details</h4>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="radio" class="deliver_to"  name="deliver_to" id="door" checked value="Door To Door Delivery">
                                <label for="door">Door To Door Delivery</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="radio" class="deliver_to"  name="deliver_to" id="Warehouse" value="Warehouse">
                                <label for="Warehouse">Warehouse</label>
                            </div>
                        </div>
                       
                        <div class="col-md-6 door">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input placeholder="Contact Person"  class="form-control"  name="dropoff" type="text" >
                            </div>
                        </div>
                        <div class="col-md-6 door">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Contact Number</label>
                                <input class="form-control"   type="text" name="local_cost" placeholder="Contact Number">
                            </div>
                        </div>
                         <div class="col-md-12 door">
                            <div class="form-group">
                                <input type="hidden" name="miles" id="quotationprice">
                                <input type="hidden" id="firstlng" name="pickup_longitude">
                                <input type="hidden" id="firstlat" name="pickup_latitude">
                                <input type="hidden" id="secondlat" name="dropoff_longitude">
                                <input type="hidden" id="secondlng" name="dropoff_latitude">
                                <label>Delivery Address</label>   
                                <input type="text" class="form-control"  id="search_input" placeholder="Address" name="pickup" name="address" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 warehouse">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Destination</label>
                               <select name="pickup" id="origin_2" class="form-control">
                                   
                                    <option value="">Select Destination</option>
                                    <option>LUZON</option>
                                    <option>VISAYAS</option>
                                    <option>MINDANAO</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 warehouse">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Location</label>
                                <select name="dropoff" id="destination_2" class="form-control" >
                                    <option value="">Select Location</option>
                                    <option class="LUZON">QUEZON CITY</option>
                                    <option class="LUZON">BULACAN</option>
                                    <option class="LUZON">PALAWAN</option>
                               
                                    <option class="VISAYAS">ILOILO</option>
                                    <option class="VISAYAS">BOHOL</option>
                                    <option class="VISAYAS">CEBU</option>
                                    <option class="VISAYAS">BACOLOD</option>
                                    <option class="VISAYAS">TACLOBAN</option>
                                    
                                    <option class="MINDANAO">DAVAO</option>
                                    <option class="MINDANAO">GENERAL SANTOS</option>
                                    <option class="MINDANAO">ZAMBOANGA CITY</option>
                                    <option class="MINDANAO">OZAMIS</option>
                                    <option class="MINDANAO">COTABATO</option>
                                    <option class="MINDANAO">CAGAYAN DE ORO</option>
                                    <option class="MINDANAO">BUTUAN</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 localfriehgt" style="dispaly:none!important">
                            <div class="form-group">
                                <label style="text-transform:capitalize">Total Local Freight Cost</label>
                                <input class="form-control"  type="text" name="local_cost" value="nill">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <hr>
                        <button class="fh-btn btn" id="back" type="button">
                            Back
                        </button>
                        <button class="fh-btn btn" id="next" type="button">
                            Next
                        </button>
                        <button class="fh-btn btn" id="final" type="submit">
                            Submit
                        </button>
                        <div class="loader" style="display:none;"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
@section('js')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
 <script>
     $("#formQuote").submit(function(e) {
         $(".loader").css("display", "block");
         $("#final").hide();
             $("#next").hide();
              $("#back").hide();
              
e.preventDefault(); // avoid to execute the actual submit of the form.


var form = $(this);
var url = form.attr('action');
if($("#formQuote")[0].checkValidity()) {
$.ajax({
       type: "POST",
       url: url,
       data: form.serialize(),
       success: function(data)
       {
            
           $('#s').css("display", "block");
           $('#success').text(data);
           $('#formQuote').css("display", "none");
       }
     });
}
return true;
});
 </script>
<script>
    $("#origin_2").change(function(){
            $("#destination_2 option").hide();
            var dest=$(this).val();
            $("."+dest).show();
            
        });
 $(".localfriehgt").hide();
    $(".step").hide();
    $("#final").hide();
    $("#first").show();
    $("#back").hide();
    $("#next").click(function(){
        
        $("#first").slideToggle();
        $("#second").slideToggle();
        $("#next").toggle();
        $("#final").toggle();
        $("#back").toggle();
        $(".localfriehgt").hide();
    });
    
    $("#back").click(function(){
        $("#first").slideToggle();
        $("#second").slideToggle();
        $("#next").toggle();
        $("#final").toggle();
         $("#back").toggle();
    });
    
    
    $(".warehouse").hide();
    $('.deliver_to').change(function(){
       if($(this).val()=="Warehouse"){
           $(".warehouse").show();
            $(".door").hide();
       }
       else{
            $(".door").show();
             $(".warehouse").hide();
       }
        $(".localfriehgt").hide();
    });
    
    
    
</script>

@endsection
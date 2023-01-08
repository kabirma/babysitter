@extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp
<style>
    .page-header .header-title{
        background-image:url("{{asset("calculator.jpg")}}"),linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));;
        background-blend-mode: overlay;
    }
</style>
 <!--Page Header-->
 <div class="page-header title-area">
    <div class="header-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-title">{{$title}}</h1>
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
                        <span>{{$title}}</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Page Header end-->

<!--contact form -->
<section class="contactpagform graybg secpadd">
    <div class="container-fluid">
        <div class="fh-section-title clearfix f25 text-center version-dark paddbtm40">
            <h2>Know how much your cargo cost.</h2>
        </div>
        {{-- <p class="paddbtm40 text-center">If you have any questions about the services we provide simply use the
            form below. We try and respond to all
            <br>queries and comments within 24 hours.
        </p> --}}
        <div class="fh-form fh-form-3" style="padding:0 10%;">
            <div class="row">
                
                
                
                <div class="col-md-6 col-sm-6">
                    <div class="col-md-12 text-center">
                        <h3>Shipping Cost</h3>
                        <hr>
                    </div>
                  <form id="cargoForm">
                      <div class="col-md-12">
                    <p class="field">
                        <select name="origin" id="origin">
                           <option value="">Select Origin</option>
                           <option>YIWU</option>
                           <option>GUANGZHUO</option>
                       </select>
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="field">
                        <select name="destination" id="destination">
                            <option value="">Select Destination</option>
                            <option value="8888" data-kg="21" data-destination="LUZON">LUZON</option>
                            <option value="14888" data-kg="41" data-destination="PALAWAN">PALAWAN</option>
                            <option value="12888" data-kg="31" data-destination="VISAYAS">VISAYAS</option>
                            <option value="13888" data-kg="38" data-destination="BOHOL">BOHOL</option>
                            <option value="14888" data-kg="41" data-destination="MINDANAO">MINDANAO</option>
                        </select>
                    </p>
                </div>
            <div class="col-md-12">
            <p class="field">
            <input type="text" id="length" placeholder="length (cm)*" name="length">
            </p>
            </div>
            <!-- Width (cm) -->
            <div class="col-md-12">
            <p class="field">
            <input type="text" id="width" placeholder="width (cm)*" name="width">
            </p>
            </div>
            <!-- Height (cm) -->
            <div class="col-md-12">
            <p class="field">
            <input type="text" id="height" placeholder="height (cm)*" name="height">
            </p>
            </div>
            <div class="col-md-12">
            <p class="field">
                <input type="text" id="weight" placeholder="Weight (kgs)*" name="weight">
                <small ><a href="#0" style="color:#C23F14;margin-left:3%">*Is CBM>KGS?</a></small>
            </p>
            </div>
            <!-- Total Packages -->
            <div class="col-md-12">
            <p class="field">
                <input type="text" id="totalPackage" placeholder="Total No of Boxes*"  name="totalPackage">
            </p>
            </div>
            <div class='text-center'>
                    <p class="field">
                        <button type="button" class="fh-btn calculate" >Compute Shipping Cost</button>
                        <button class="fh-btn reset" type="button">Reset</button>

                    </p>
                </div>
            <!-- Weight (kg) -->
            <div class="col-md-12">
            <p class="field">
                <input type="text" id="weight1" placeholder="Total Weight (kgs)*" disabled name="weight">
                <small ><a href="#0" style="color:#C23F14;margin-left:3%">*Is CBM>KGS?</a></small>
            </p>
            </div>
            <div class="col-md-12">
            <p class="field">
            <input type="text" placeholder="CBM*" class="cbm__total__numb" disabled/>
            <small ><a href="#0" style="color:#C23F14;margin-left:3%">*Know Your CBM?</a></small>
            </p>
            </div>
            <!-- Calculate Button -->
            <!-- <div class="calc--btn"><input type="submit" value="CALCULATE"></div> -->
                <div class="text-center">
                    <h3 id="valueTotal" style="display:none;">Total Shipping Cost: <span class="ratePesoTotal">1234</span> PHP</h3>
                    <hr>
                </div>
        </form>
                </div>
                <div class="col-md-6 col-sm-6">
                    <form>
            <div class="fh-form fh-form-3" style="padding:0 10%;">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Local Freight Cost</h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                           <select name="origin_2" id="origin_2">
                                <option value="">Select Origin</option>
                                <option>LUZON</option>
                                <option>VISAYAS</option>
                                <option>MINDANAO</option>
                           </select>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                            <select name="destination_2" id="destination_2">
                                <option value="">Select Destination</option>
                                <option class="LUZON" data-r="288" data-k="38" data-address='Blk 211 Lot 9 Mark St. North Fairview Quezon City'>QUEZON CITY</option>
                                <option class="LUZON" data-r="488" data-k="68" data-address='Lot 28 National Highway Brgy. Garlang San Ildefonso Bulacan'>BULACAN</option>
                                <option class="LUZON" data-r="1888" data-k="88" data-address='#9 Bagalay Compound BM Rd. Bgy. San Pedro Puerto, Princesa, Palawan'>PALAWAN</option>
                                <option class="VISAYAS" data-r="488" data-k="68" data-address='Tamarra Compound Tugas, Barangay Inayawan'>CEBU</option>
                                <option class="VISAYAS" data-r="488" data-k="68" data-address='B17 L2 Granada Hites Bacolod City, Negros Occidental'>BACOLOD</option>
                                <option class="VISAYAS" data-r="488" data-k="68" data-address='6 th St. Lawaan Village Balantang Jaro, Iloilo'>ILOILO</option>
                                <option class="VISAYAS" data-r="1888" data-k="88" data-address='National Hi-way Tabalong Dauis Bohol'>BOHOL</option>
                                <option class="VISAYAS" data-r="488" data-k="68" data-address='Brgy .97 Cabalawan, Tacloban City'>TACLOBAN</option>
                                <option class="MINDANAO" data-r="888" data-k="68" data-address='B20 L6 Firenza St. Toscana Subd., Upper Libby Rd. Puan, Davao City'>DAVAO</option>
                                <option class="MINDANAO" data-r="888" data-k="68" data-address='Door 1 Arenas Apart Geronimo St. Lagao General Santos City'>GENERAL SANTOS</option>
                                <option class="MINDANAO" data-r="888" data-k="68" data-address='KM, Duramos Dr. Pasonanca Zamboanga City'>ZAMBOANGA CITY</option>
                                <option class="MINDANAO" data-r="888" data-k="68" data-address='P-1 Litapan Ozamiz City'>OZAMIS</option>
                                <option class="MINDANAO" data-r="888" data-k="68" data-address='Purok 2 Governor Gutierrez St. Cotabato City'>COTABATO</option>
                                <option class="MINDANAO" data-r="888" data-k="68" data-address='Inside Catimco Compound Julio Pacana St. Puntod, Cagayan De Oro City'>CAGAYAN DE ORO</option>
                                <option class="MINDANAO" data-r="488" data-k="68" data-address='P-8 Obrero Butuan City, Cagayan De Oro City'>BUTUAN</option>
                            </select>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                          <input type="text" class="form-control" id="search_input" placeholder="Destination Address" />
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                            <input id="" placeholder="City/Municipality*" type="text">
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                            <input id="description" placeholder="Item Description*" type="text">
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                            <input id="kgs_3" placeholder="Weight (kgs)*" type="text">
                            <small ><a href="#0" style="color:#C23F14;margin-left:3%">*Is CBM>KGS?</a></small>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                            <input id="no_boxes_2" placeholder="Total No of Boxes*" type="text">
                        </p>
                    </div>
                    <div class="col-md-12 text-center">
                        <p class="field">
                            <button class="fh-btn calculate_2" type="button">Compute Local Freight Cost</button>
                            <button class="fh-btn reset_2" type="button">Reset</button>
                        </p>
                        
                    </div>
                    
                    <div class="col-md-12">
                        <p class="field">
                            <input id="kgs_2" placeholder="Total Weight (kgs)*" disabled type="text">
                            <small ><a href="#0" style="color:#C23F14;margin-left:3%">*Is CBM>KGS?</a></small>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="field">
                            <input id="cbm_2" placeholder="Total CBM*" type="text">
                            <small ><a href="#0" style="color:#C23F14;margin-left:3%">*Know Your CBM?</a></small>
                        </p>
                    </div>
                    <div class="contact-form-message_2 text-center">
                        
                        <h3>Total Local Freight Cost: <span id="total_2"></span> PHP</h3>
                        <hr>
                    </div>
                  
                   
                </div>
            </div>
        </form>
                </div>

            </div>
        </div>
        <br><br><hr>
        
    </div>
</section>
<!--contact form  end -->


@endsection
@section('js')
    
    <script>
    var searchInput = 'search_input';
 
 $(document).ready(function () {
  var autocomplete;
  autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
   types: ['geocode'],
   componentRestrictions: {
    country: "PH"
   }
  });
   
  google.maps.event.addListener(autocomplete, 'place_changed', function () {
   var near_place = autocomplete.getPlace();
  });
 });
</script>
    
    <script>
        //   const form = document.querySelector("#cargoForm");
        $(".calculate").click(function(){
            
           const addTotalCBM = document.querySelector(".cbm__total__numb");
const addTotalWeight = document.querySelector(".total__weight__numb");
const ratePesoTotal = document.querySelector(".ratePesoTotal");
// const style = "color: orangered; font-weight: bold;  -webkit-text-stroke: 1px black; font-size:30px;";
    const o = $('#totalPackage').val();
    const e = undefined;
    const n = $('#length').val() * $('#width').val() * $('#height').val() / 1e6;
    const a = `${n*o}`;
    addTotalCBM.value = `${a}`;
    const l = $('#weight').val();
    // addTotalWeight.textContent = `${l*o}`;
    $('#weight1').val(`${l*o}`);
    const r = 475;
    const c = n * r;
    const s = $('#destination option:selected').val(); //8888
    const i = $('#destination option:selected').data('kg') //2
    const u = Math.round( $('#weight').val() );
    const d = u * i;
    const g = u / n;
    const destination = $('#destination option:selected').data('destination');
    var dRate;
    if(destination == "LUZON"){
        (a < .01 && u >= c || a >= .01 && u >= r) && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a >= .01 && u < r && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), a >= .01 && u < c && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), g >= r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a < .01 && u < r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`);
     const m = ratePesoTotal.innerText;
    const f = undefined;
    parseFloat(m.replace(/"|\,|\./g, "")) <= 88.88 && (ratePesoTotal.textContent = '88.88')
        
    }else if(destination == "PALAWAN"){
        (a < .12 && u >= c || a >= .12 && u >= r) && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a >= .12 && u < r && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), a >= .12 && u < c && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), g >= r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a < .12 && u < r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`);
     const m = ratePesoTotal.innerText;
    const f = undefined;
    parseFloat(m.replace(/"|\,|\./g, "")) <= 1888 && (ratePesoTotal.textContent = `${1888..toLocaleString()}`)
    }else if(destination == "VISAYAS"){
        (a < .068 && u >= c || a >= .068 && u >= r) && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a >= .068 && u < r && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), a >= .068 && u < c && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), g >= r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a < .068 && u < r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`);
     const m = ratePesoTotal.innerText;
    const f = undefined;
    parseFloat(m.replace(/"|\,|\./g, "")) <= 888 && (ratePesoTotal.textContent = `${888..toLocaleString()}`)
    }else if(destination == "BOHOL"){
        (a < .07 && u >= c || a >= .07 && u >= r) && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a >= .07 && u < r && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), a >= .07 && u < c && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), g >= r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a < .07 && u < r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`);
     const m = ratePesoTotal.innerText;
    const f = undefined;
    parseFloat(m.replace(/"|\,|\./g, "")) <= 988 && (ratePesoTotal.textContent = `${988..toLocaleString()}`)
    }else if(destination == "MINDANAO"){
        (a < .12 && u >= c || a >= .12 && u >= r) && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a >= .12 && u < r && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), a >= .12 && u < c && (ratePesoTotal.textContent = `${(a*s).toLocaleString()}`), g >= r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`), a < .12 && u < r && (ratePesoTotal.textContent = `${(d*o).toLocaleString()}`);
     const m = ratePesoTotal.innerText;
    const f = undefined;
    parseFloat(m.replace(/"|\,|\./g, "")) <= 1888 && (ratePesoTotal.textContent = `${1888..toLocaleString()}`)
    }
    $("#valueTotal").css("display", "block");
        });
        

        $(".contact-form-message_2").hide();
        $(".calculate_2").click(function(){
            if($('#destination_2 option').prop("selected") == true){
                alert('You must fill in all of the fields');
            }else if(!$('#search_input').val()){
                alert('You must fill in all of the fields')
            }else{
                calculateDistance();
            }
        });
        
        function calculateDistance() {
            var origin = $("#destination_2 :selected").data('address');
            var destination = $('#search_input').val();
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callback);
        }
        
        function callback(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    // console.log(response.rows[0].elements[0].distance);
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    var k = $("#destination_2 :selected").data('k');
                    var r = $("#destination_2 :selected").data('r');
                    $(".contact-form-message_2").show();
                    $('#total_2').text(distance_in_kilo * k + r);
                    
                    // var distance_in_mile = distance.value / 1609.34; // the mile
                    // var duration_text = duration.text;
                    // var duration_value = duration.value;
                    // $('#in_mile').text(distance_in_mile.toFixed(2));
                    // $('#in_kilo').text(distance_in_kilo.toFixed(2));
                    // $('#duration_text').text(duration_text);
                    // $('#duration_value').text(duration_value);
                    // $('#from').text(origin);
                    // $('#to').text(destination);
                }
            }
        }


        $("#origin_2").change(function(){
            $("#destination_2 option").hide();
            var dest=$(this).val();
            $("."+dest).show();
        });
    </script>

@endsection
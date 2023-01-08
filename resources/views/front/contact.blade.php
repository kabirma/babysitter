@extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp

 <!--Page Header-->
 <div class="page-header title-area">
    <div class="header-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-title">Contact</h1>
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
                        <span>Contact</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Page Header end-->

<!--contact pagesec-->
<section class="contactpagesec secpadd">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="opening-hours vc_opening-hours">
                    <h3 class="text-center">OUR CHINA WAREHOUSE</h3>
                    <p>
                        <h3 class="text-center">Sea Cargo Address</h3>
                        <b>GUANGZHUO ADDRESS:</b><br>
                        No. 6, Huangang 2nd Road,
                        Qixinggang Road, Baiyun District,
                        Guangzhou (in Mingtong Property
                        Management Park)<br>
                        Phone number: 155 7937 5151<br><br>
                        
                        地址：广州市白云区七星岗路环岗二路6号（明通物业管理园内）<br>
                        导航：创遇刀模材料西南门<br>
                        联系人：陈先生<br>
                        Tel：155 7937 5151<br>
                        <br><br>
                        
                        <b>YIWU ADDRESS:</b><br>
                      No. 6, Building 1, 1st Floor, Road Gang, No. 1666, Sihai Avenue, Yiwu
                       <br>
                      Contact: Chen Yu<br>
                        Tel: 18806797395<br><br>
                        
                        义乌四海大道1666号公路港一楼1栋6号<br>
                     联络人:陈宇<br>
                       联系电话： 18806797395<br>
                    </p>
                    
                    <p>
                        <h3 class="text-center">Air Cargo Address</h3>
                        <b>SHENZHEN ADDRESS:</b><br>
                        102, Building A, No. 11, Jiu Alley, Xinhe 3rd District, Fuyong District, Baoan District, Shenzhen (Fuhai Street), Guangdong Province
 1<br> Contact: Jihang<br><br>
                        
                        空运地址：广东省深圳市宝安区福永区信合三区九巷 11 号 A 栋 102 （福海街） <br>
联系人：吉航<br>
                        Tel：155 7937 5151<br>
                        
                    </p>
                    
                </div>
            </div>
            <div class="col-md-12" style="margin-top:2%;margin-bottom:2%">
                <div class="opening-hours vc_opening-hours text-center">
                    <h3>OUR PHILIPPINES WAREHOUSE</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="opening-hours vc_opening-hours">
                    <h3>LUZON</h3>
                    <p>
                        <b>QUEZON CITY</b><br>
                        Blk 211 Lot 9 Mark St. North Fairview Quezon City<br><br>
                        <b>BULACAN</b><br>
                        Lot 28 National Highway Brgy. Garlang San
                        Ildefonso Bulacan<br><br>

                        <b>PALAWAN</b>
                        <br>
                        #9 Bagalay Compound BM Rd. Bgy. San Pedro Puerto,
                        Princesa, Palawan
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="opening-hours vc_opening-hours">
                    <h3>VISAYAS</h3>
                    <p>
                        <b>CEBU</b><br>

                        Tamarra Compound Tugas, Barangay Inayawan<br><br>
                       

                        <b>BACOLOD</b>
                        <br>
                        B17 L2 Granada Heights Bacolod City, Negros Occidental<br><br>

                        <b>ILOILO</b><br>
                        6 th St. Lawaan Village Balantang Jaro, Iloilo<br><br>

                        <b>BOHOL</b><br>
                        National Hi-way Tabalong Dauis Bohol<br><br>
                        
                        <b>TACLOBAN</b><br>
                        Brgy .97 Cabalawan, Tacloban City
                    </p>    
                </div>
            </div>
            <div class="col-md-6">
                <div class="opening-hours vc_opening-hours">
                    <h3>MINDANAO</h3>
                    <p>
                        <b>DAVAO</b><br>
                        B20 L6 Firenza St. Toscana Subd., Upper Libby Rd.
                        Puan, Davao City<br><br>

                        <b>GENERAL SANTOS</b><br>
                        Door 1 Arenas Apart Geronimo St. Lagao General Santos City<br><br>

                        <b>ZAMBOANGA CITY</b><br>
                        KM, Duramos Dr. Pasonanca Zamboanga City<br><br>

                        <b>OZAMIS</b><br>
                        P-1 Litapan Ozamiz City<br><br>

                        <b>COTABATO</b><br>
                        Purok 2 Governor Gutierrez St. Cotabato City<br><br>

                        <b>CAGAYAN DE ORO</b><br>
                        Inside Catimco Compound Julio Pacana St. Puntod, Cagayan De Oro City<br><br>

                        <b>BUTUAN</b><br>
                        P-8 Obrero Butuan City, Agusan del Norte
                    </p>
                </div>
            </div>

            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-12">
                <div class="fh-section-title clearfix f25 text-left version-dark paddbtm40">
                    <h2>Contact Details</h2>
                </div>
                <p class="margbtm30">If you have any questions about what we offer for consumers or for
                    business, you can always email us or call us via the below details. We’ll reply within 24
                    hours.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="fh-contact-box type-address "><i class="flaticon-pin"></i>
                            <h4 class="box-title">Visit our office</h4>
                            <div class="desc">
                                <p>{{$company->location}}</p>
                            </div>
                        </div>
                        <div class="fh-contact-box type-email "><i class="flaticon-business"></i>
                            <h4 class="box-title">Mail Us at</h4>
                            <div class="desc">
                                <p>{{$company->email}}
                                  
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="fh-contact-box type-phone "><i class="flaticon-phone-call "></i>
                            <h4 class="box-title">Call us on</h4>
                            <div class="desc">
                                <p>
                                    Landline: 02-8355-2006<br>
Globe: +63926-033-7977<br>
Smart: +63919-603-1026
                                </p>
                            </div>
                        </div>
                        <div class="fh-contact-box type-social "><i class="flaticon-share"></i>
                            <h4 class="box-title">We are social</h4>
                            <ul class="clearfix">
                                <li class="facebook">
                                    <a href="{{url($company->facebook)}}" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="{{url($company->linkedin)}}" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="googleplus">
                                    <a href="{{url($company->instagram)}}" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--contact end-->

<!--contact form -->
<section class="contactpagform graybg secpadd">
    <div class="container">
        <div class="fh-section-title clearfix f25 text-center version-dark paddbtm40">
            <h2>Leave Your Message</h2>
        </div>
        <p class="paddbtm40 text-center">If you have any questions about the services we provide simply use the
            form below. We try and respond to all
            <br>queries and comments within 24 hours.
        </p>
        <form method="post" action="{{route('contactsubmit')}}">
            <div class="fh-form fh-form-3">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <p class="field">
                            <input name="name" placeholder="Your Name*" type="text">
                        </p>
                        <p class="field">
                            <input name="email" placeholder="Email Address*" type="email">
                        </p>
                        <p class="field">
                            <input name="phone" placeholder="Phone" type="text">
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <p class="field single-field">
                            <textarea name="message" cols="40" rows="10"
                                placeholder="Your Message..."></textarea>
                        </p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="field submit">
                            <button class="fh-btn" type="submit">Submit</button>
                        </p>
                    </div>
                  
                    <div class="contact-form-message">
                        @if(Session::has('success'))
                        <div class="alert alert-success text-center">
                            <i class="fa fa-check"></i> {{ Session::get('success') }}
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--contact form  end -->

@endsection
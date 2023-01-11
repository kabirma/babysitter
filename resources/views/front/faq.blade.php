   @extends('front.layout.app')

   @section('content')
       <!--=================================
                banner -->
       <section class="header-inner bg-dark text-center">
           <div class="container">
               <div class="row">
                   <div class="col-sm-12 ">
                       <ol class="breadcrumb mb-0 p-0">
                           <li class="breadcrumb-item"><a href="{{ route('index') }}"> Home </a></li>
                           <li class="breadcrumb-item active">Frequently Asked Questions</li>
                       </ol>
                       <h2 class="inner-banner-title">Frequently Asked Questions</h2>
                   </div>
               </div>
           </div>
       </section>
       <!--=================================
                    banner -->

       <!--=================================
                    Frequently Asked Questions -->
       <section class="space-ptb">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="accordion" id="accordion">

                           @foreach ($faq as $key=>$item)
                               <div class="card">
                                   <div class=" accordion-icon card-header" id="heading{{ $item->id }}">
                                       <h5 class="accordion-title mb-0">
                                           <button class="btn btn-link d-flex align-items-center ms-auto {{$key>0 ? "collapsed" : ""}}"
                                               data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}"
                                               aria-expanded="{{$key==0 ? "true" : "false"}}"
                                               aria-controls="collapse{{ $item->id }}">{{ $item->question }}</button>
                                       </h5>
                                   </div>
                                   <div id="collapse{{ $item->id }}" class="collapse {{$key==0 ? "show" : ""}} accordion-content"
                                       aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordion">
                                       <div class="card-body">
                                           <p>
                                               <?= $item->answer ?>
                                           </p>
                                       </div>
                                   </div>
                               </div>
                           @endforeach

                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!--=================================
                    Frequently Asked Questions -->


       <!--=================================
                Action-box -->
       <section class="space-pb">
           <div class="container">
               <div class="callout">
                   <div class="row align-items-center">
                       <div class="col-xl-8 col-lg-7 col-md-9">
                           <div class="callout-title">
                               <h3>Are you looking for senior carer or baby sitter just call us!</h3>
                           </div>
                       </div>
                       <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                           <img class="img-fluid" src="images/action-box-arrow.png" alt="">
                       </div>
                       <div class="col-xl-2 col-lg-3 col-md-3">
                           <div class="callout-botton">
                               <a href="tel:{{ $company->phone }}" class="btn btn-md btn-primary"><i
                                       class="fas fa-headset"></i>{{ $company->phone }}</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!--=================================
                Action-box -->
   @endsection

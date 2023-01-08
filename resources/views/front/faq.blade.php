   @extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp
<style>
    .page-header .header-title{
        background-image:url("{{asset("faqs images.jpg")}}") ,linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));;
        background-blend-mode: overlay;
    }
</style>

     <!--Page Header-->
        <div class="page-header title-area">
            <div class="header-title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h1 class="page-title">FAQ’S</h1>
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
                                <span>FAQ’S</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Page Header end-->

        <!--faq pagesec-->
        <section class="faqpagesec secpadd">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="servdtlaccord margbtm40">
                            <div class="panel-group" id="accordion">
                                @foreach(App\Faq::get() as $key=>$item)
                                    <div class="panel panel-default">
                                    <div class="panel-heading @if($key==0) active-panel @endif">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $item->id ?>"
                                                href="#collapseOne<?= $item->id ?>">
                                                <?= $item->question ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne<?= $item->id ?>" class="panel-collapse collapse @if($key==0) in @endif">
                                        <div class="panel-body">
                                            <?= $item->answer ?>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--faqpagesec end-->
        
        
@endsection
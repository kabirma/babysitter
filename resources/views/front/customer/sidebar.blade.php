
       <!--=================================
    banner -->
    <section class="header-inner bg-dark text-center">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 ">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active">Customer Dashboard</li>
              </ol>
              <h2 class="inner-banner-title">Customer Dashboard</h2>
            </div>
          </div>
        </div>
      </section>
      <!--=================================
      banner -->
      <section class="space-ptb">
    <div class="container">
        <div class="row">
            <aside class="col-sm-4">
                <div class="category-list">
                    <div class="widget">
                  <div class="widget-title">
                    <h4>Customer Menu</h4>
                  </div>
                  <div class="categories">
                    <ul class="list-unstyled list-style mb-0">
                      <li>
                        <a href="{{route('customer_dashboard')}}" target="_parent">
                            <i class="fa fa-chart-bar"></i>  Dashboard
                        </a>
                      </li>
                     <li>
                        <a href="{{route('customer_profile')}}" target="_parent">
                            <i class="fa fa-user-circle"></i>  Profile
                        </a>
                     </li>
                     <li>
                        <a href="{{route('customer_schedule')}}" target="_parent">
                            <i class="fa fa-calendar"></i>  Schedule
                        </a>
                     </li>
                     <li>
                        <a href="{{route('customerlogout')}}" target="_parent">
                            <i class="fa fa-arrow-left"></i>  Logout
                        </a>
                     </li>
                    </ul>
                  </div>
                </div>
              </div>
             
            </aside>
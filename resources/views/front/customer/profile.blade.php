@extends('front.layout.app')

@section('content')
@include('front.customer.sidebar')
            <div class="col-sm-8 blog-base">
                <div class="col-sm-12 no-padding">
                    @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        <i class="fa fa-check"></i> {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-times"></i> {{ Session::get('error') }}
                    </div>
                    @endif
                    @php
                        $customer=Auth::guard('customer')->user();
                    @endphp
                  <form method="post" action="{{route('profile_submit')}}" id="customer_login">
                      @csrf
                      <label for="customer_password"><span>Name</span><em>*</em></label>
                      <input type="text" value="{{$customer->first_name}}" class="form-control" required name="first_name" id="customer_password">
      
                      <label for="customer_email"><span>Email Address</span><em>*</em></label>
                      <input type="email" value="{{$customer->email}}" class="form-control" required name="email" id="customer_email">
          
                      <label for="customer_password"><span>Password</span><em>*</em></label>
                      <input type="password" value="{{$customer->pin}}" class="form-control" required name="password" id="customer_password">
          
                      <label for="customer_password"><span>Phone</span><em>*</em></label>
                      <input type="number" value="{{$customer->phone}}" class="form-control" required name="phone" id="customer_password">
                      
                      <label for="customer_password"><span>Address</span><em>*</em></label>
                      <input type="text" value="{{$customer->address}}" class="form-control" required name="address" id="customer_password">
      
                      <div class="form-group">
                         <br>
                        <p><input type="submit" class="btn btn-primary" value="Update"></p>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
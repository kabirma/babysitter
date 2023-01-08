@extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp



<section id="breadcrumb" class="space">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 breadcrumb-block">
                <h2>Login/Register</h2>
            </div>
            <div class="col-sm-6 breadcrumb-block text-right">
                <ol class="breadcrumb">
                    <li><span>You are here:</span><a href="{{route('index')}}">Home</a></li>
                    <li class="active">Login/Register</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section id="about" class="space bg-color">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="note form-success" id="resetSuccess" style="display:none;">
                  We've sent you an email with a link to update your password.
                </div>
               
                <form method="post" action="{{route('loginsubmit')}}" id="customer_login">
                  <h3 class="newCustomer">ALREADY REGISTERED?</h3>
                  @csrf
                
                  @if(Session::has('loginsuccess'))
                  <div class="alert alert-success text-center">
                      <i class="fa fa-check"></i> {{ Session::get('loginsuccess') }}
                  </div>
                  @endif
          
                  @if(Session::has('loginerror'))
                  <div class="alert alert-danger text-center">
                      <i class="fa fa-times"></i> {{ Session::get('loginerror') }}
                  </div>
                  @endif
      
                  <label for="customer_email"><span>Email Address</span><em>*</em></label>
                  <input type="email" value=""  class="form-control" name="email" id="customer_email">
      
      
                  <label for="customer_password"><span>Password</span><em>*</em></label>
                  <input type="password" value="" class="form-control" name="password" id="customer_password">
      
      
                  <div class="action-btn">
                      <br>
                    <p><input type="submit" class="btn btn-primary" value="Login"></p>
                   
                  </div>
                </form>
              
              </div>
              <div class="col-sm-6">
                <div class="login-form-box">
                  <h3 class="newCustomer">NEW CUSTOMER</h3>
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
                  <form method="post" action="{{route('registersubmit')}}" id="customer_login">
                      @csrf
                      <label for="customer_password"><span>Name</span><em>*</em></label>
                      <input type="text" value="" class="form-control" required name="first_name" id="customer_password">
      
                      <label for="customer_email"><span>Email Address</span><em>*</em></label>
                      <input type="email" value="" class="form-control" required name="email" id="customer_email">
          
                      <label for="customer_password"><span>Password</span><em>*</em></label>
                      <input type="password" value="" class="form-control" required name="password" id="customer_password">
          
                      <label for="customer_password"><span>Phone</span><em>*</em></label>
                      <input type="number" value="" class="form-control" required name="phone" id="customer_password">
                      
                      <label for="customer_password"><span>Address</span><em>*</em></label>
                      <input type="text" value="" class="form-control" required name="address" id="customer_password">
      
      
                      <div class="form-group">
                         <br>
                        <p><input type="submit" class="btn btn-primary" value="Register"></p>
                       
                      </div>
                    </form>
                </div>
                
              </div>
      
        </div>
    </div>
</section>

@endsection
@extends('front.layout.app')

@section('content')
    <!--=================================
                banner -->
    <section class="header-inner bg-dark text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Login/Register</li>
                    </ol>
                    <h2 class="inner-banner-title">Login/Register</h2>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                    banner -->

    <!--=================================
                    Login -->
    <section class="space-ptb login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-10">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <i class="fa fa-check"></i> {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center">
                            <i class="fa fa-times"></i> {{ Session::get('error') }}
                        </div>
                    @endif
                    @if (Session::has('loginsuccess'))
                        <div class="alert alert-success text-center">
                            <i class="fa fa-check"></i> {{ Session::get('loginsuccess') }}
                        </div>
                    @endif

                    @if (Session::has('loginerror'))
                        <div class="alert alert-danger text-center">
                            <i class="fa fa-times"></i> {{ Session::get('loginerror') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                                aria-controls="login" aria-selected="false">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab"
                                aria-controls="register" aria-selected="true">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form class="row mt-4 align-items-center" method="post" action="{{ route('loginsubmit') }}">
                                @csrf


                                <div class="mb-3 col-sm-12">
                                    <label class="form-label">Email:</label>
                                    <input type="text" class="form-control" required name="email" placeholder="">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label class="form-label">Password:</label>
                                    <input type="Password" class="form-control" required name="password" placeholder="">
                                </div>
                                <div class="col-sm-4 offset-sm-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form class="row mt-4 mb-5 align-items-center" method="post"
                                action="{{ route('registersubmit') }}"
                                oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "Passwords do not match." : "")'>
                                @csrf

                                <div class="mb-3 col-sm-12 select-border">
                                    <label class="form-label">Service Offered:</label>
                                    <select name="service" class="form-control basic-select">
                                        <option value="1">Babysitting</option>
                                        <option value="2">Caring for Old
                                            People</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" required class="form-control" name="first_name" placeholder="">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" required class="form-control" name="last_name" placeholder="">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label class="form-label">Email Address:</label>
                                    <input type="email" required class="form-control" name="email" placeholder="">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label class="form-label">Phone:</label>
                                    <input type="tel" required class="form-control" name="phone" placeholder="">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">Password:</label>
                                    <input type="Password" required class="form-control" name="password" placeholder="">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label">Confirm Password:</label>
                                    <input type="Password" required class="form-control" name="confirm_password"
                                        placeholder="">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label class="form-label">Bio:</label>
                                    <input type="text" required class="form-control" name="bio" placeholder="">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" id="search_input" required class="form-control" name="address"
                                        placeholder="">
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label class="form-label">Account Type:</label>
                                    <br>
                                    <label for="offerer">
                                        <input type="radio" required name="type" value="1" id="offerer">
                                        Offerer
                                    </label>

                                    <label for="Supplier">
                                        <input type="radio" required name="type" value="2" id="Supplier">
                                        Supplier
                                    </label>
                                </div>
                                <div class="col-sm-4 offset-sm-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Sign up</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                    Login -->
@endsection

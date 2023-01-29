@extends('front.layout.app')

@section('content')
    @include('front.customer.sidebar')
    <div class="col-sm-8 card">
        <div class="col-sm-12 card-body">
            <h4>Profile</h4>
            <hr>
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
            @php
                $customer = Auth::guard('customer')->user();
            @endphp
            <form method="post" action="{{ route('profile_submit') }}" class="row" enctype="multipart/form-data">
                @csrf
                @php
                    $placeholder="/front/images/placeholder.png";
                    $profile_pic=is_null($customer->image) ? $placeholder : $customer->image;
                @endphp
                <div class="mb-3 col-sm-12">
                    <img src="{{asset($profile_pic)}}" id="profile_pic" style="height: 100px" alt="<?= $customer->first_name ?>">
                    <input type="file" class="form-control" name="image" onchange="document.getElementById('profile_pic').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label">First Name:</label>
                    <input type="text" required class="form-control" name="first_name"
                        value="<?= $customer->first_name ?>">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label">Last Name:</label>
                    <input type="text" required class="form-control" name="last_name"
                        value="<?= $customer->last_name ?>">
                </div>
                <div class="mb-3 col-sm-12">
                    <label class="form-label">Email Address:</label>
                    <input type="email" readonly class="form-control" name="email"
                        value="<?= $customer->email ?>">
                </div>
                <div class="mb-3 col-sm-12">
                    <label class="form-label">Phone:</label>
                    <input type="tel" required class="form-control" name="phone"
                        value="<?= $customer->phone ?>">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label">Password:</label>
                    <input type="Password"  class="form-control" name="password" value="">
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label">Confirm Password:</label>
                    <input type="Password"  class="form-control" name="confirm_password" value="">
                </div>
                <div class="mb-3 col-sm-12">
                    <label class="form-label">Bio:</label>
                    <input type="text" required class="form-control" name="bio"
                        value="<?= $customer->bio ?>">
                </div>
                <div class="mb-3 col-sm-12">
                    <label class="form-label">Address</label>
                    <input type="text" id="search_input" required class="form-control" name="address"
                        value="<?= $customer->address ?>">
                    <input type="hidden" id="latitude" value="<?= $customer->latitude ?>"
                        name="latitude">
                    <input type="hidden" id="longitude" value="<?= $customer->longitude ?>"
                        name="longitude">
                </div>
                <div class="col-sm-4 offset-sm-4">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </section>
@endsection

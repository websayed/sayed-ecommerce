@extends('frontend.master')
@section('content')
 



    <!-- Checkout Start -->
    <div class="container pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                   
                    <form action="{{url('/save-shipping-address')}}" method="post">
                            @csrf
                        <div class="form-group ">
                            <input class="input form-control" type="text" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="zip_code" placeholder="ZIP Code">
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="tel" name="mobile" placeholder="Mobile No">
                        </div>
                            <input type="submit" class="btn btn-outline-primary order-submit" value="Next" style="float: right;">
                        </form>
                        
                   
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- Checkout End -->


@endsection

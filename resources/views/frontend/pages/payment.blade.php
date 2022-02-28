@extends('frontend.master')
@section('content')

@include('frontend.nav_banner')

   <!-- Page Header Start -->
   <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Order Details -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="section text-center">
            <h3 class="title">Your Order</h3>
        </div>
        <div class="order-summary text-center">
            <div class="order-col">
                <div><strong>PRODUCT</strong></div>
                <div><strong>TOTAL</strong></div>
            </div>
            @foreach($cart_array as $cart)
            <div class="order-products">
                <div class="order-col">
                    <div>{{$cart['quantity']}} x {{$cart['name']}}</div>
                    <div>&#2547;{{Cart::get($cart['id'])->getPriceSum()}}</div>
                </div>
            </div>
            @endforeach
            <div class="order-col">
                <div>Shiping</div>
                <div><strong>&#2547;50</strong></div>
            </div>
            <div class="order-col">             
                <div><strong class="order-total"><h1>Total</h1> &#2547; {{Cart::getTotal()+50}}</strong></div>
            </div>
        </div>
            </div>
      
    <div class="col-md-6 ">

            <form action="{{url('/order-place')}}" method="post">
                @csrf

        <div class="section text-center">
            <h4 class="title" style="color: #D10024;">Please select a payment method </h4>

        </div>
        <div class="payment-method text-center">
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-1" value="cash">
                <label for="payment-1">
                    <span></span>
                    Cash On Delivery
                </label>
                <div class="text-center">
                    <p>You can also select Cash on Delivery!!</p>
                </div>
            </div>
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-2" value="Bkash">
                <label for="payment-2">
                    <span></span>
                    Bkash
                </label>
                <div class="caption">
                    <p>Bkash No: 01308983894</p>
                </div>
            </div>
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-3" value="nogod">
                <label for="payment-3">
                    <span></span>
                   Nogod
                </label>
                <div class="caption">
                    <p>Nogod No: 01308983894</p>
                </div>
            </div>
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-3" value="rocket">
                <label for="payment-3">
                    <span></span>
                    Rocket
                </label>
                <div class="caption">
                    <p>Rocket No: 01308983894</p>
                </div>
            </div>


        </div>
        <div class="input-checkbox text-center">
            <input type="checkbox" id="terms">
            <label for="terms">
                <span></span>
                I've read and accept the <a href="#">terms & conditions</a>
            </label>
        </div>
        <input type="submit" class="btn btn-primary order-submit" value="Place Order" style="float: right">
            </form>
    </div>

    
        </div>
    </div>
    <!-- /Order Details -->

@endsection

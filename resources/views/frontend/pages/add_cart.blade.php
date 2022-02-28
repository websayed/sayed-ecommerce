@extends('frontend.master')
@section('content')



@php
$cart_array= cardArray();
@endphp

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
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($cart_array as $v_add_cart)
                    @php
                    $images= $v_add_cart['attributes'][0];
                    $images=explode('|',$images);
                    $images=$images[0];
                    @endphp
                    <tr>
                        <td class="align-middle"><img width="50px" src="{{asset('/image/'.$images)}}"> {{$v_add_cart['name']}}</td>
                        <td class="align-middle">{{$v_add_cart['price']}} </td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{$v_add_cart['quantity']}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">৳ {{Cart::getTotal()}}</td>
                        <td class="align-middle"><a href="{{url('/delete-cart/'.$v_add_cart['id'])}}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="mt-3">
                <?php
                $customer_id = Session::get('id');
                $shipping_id = Session::get('sid');
                ?>

                <?php
                if ($customer_id != NULL && $shipping_id == NULL) { ?>
                    <a href="{{URL::to('/checkout')}}" class="bth btn-primary d-inline  border-0 p-2 " style="float: right"><i class="fa fa-arrow-circle-right"></i>Next</a>
                <?php } elseif ($customer_id != NULL && $shipping_id != NULL) { ?>
                    <a href="{{URL::to('/payment')}}" class="bth btn-primary d-inline   border-0 p-2" style="float: right"><i class="fa fa-arrow-circle-right"></i>Next</a>
                <?php } else { ?>
                    <a href="{{URL::to('/login-check')}}" class="bth btn-primary d-inline   border-0 p-2" style="float: right"><i class="fa fa-arrow-circle-right"></i>Next</a>
                <?php } ?>
            </div>

        </div>
        <div class="row">
            <div class="col">


            </div>
        </div>

    </div>
</div>
<!-- Cart End -->



@endsection
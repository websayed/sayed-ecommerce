
@extends('frontend.master')
@section('content')




<div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach($categories as $category)
                        <a href="{{url('/product_by_cat/'.$category->id)}}" class="nav-item nav-link"><i class="fa fa-angle-right mr-3"></i>{{$category->name}}</a>
                    @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Al</span>Amanot</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{url('/')}}" class="nav-item nav-link active"><i class="fas fa-home mr-2"></i>Home</a>
                            <a href="{{url('/allshop')}}" class="nav-item nav-link">Shop</a>
                            <a href="detail.html" class="nav-item nav-link">Blog</a>
                            <a href="detail.html" class="nav-item nav-link">About</a>
                            
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">

            @php
            $customer_id=Session::get('id');
            @endphp
            @if($customer_id!=Null)

            <li><a href="{{url('/user-profile/'.$customer_id)}}" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">{{Session::get('customer_name')}}</span>
                </a></li>
            @else
                <li><a href="{{url('/login-check')}}" class="btn border d-inline">
                <i class="fas fa-sign-in-alt text-primary"></i>
                    
                </a></li>
            @endif                        
                <!-- 
                    <li><a href="{{url('/cus-logout')}}" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">100</span>
                </a></li>
                 -->
                
                        </div>
                    </div>
                </nav>
                @yield('slider')
            </div>
        </div>
    </div>


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
    @include('frontend.brand')


<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Lates Product</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        @foreach($products as $product)
                                    
        @php
            $product['image'] = explode('|',$product->image);
        $images=$product->image[0];
        @endphp
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img  class="img-fluid w-100"  src="{{asset('/image/'. $images)}}" >
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>৳ {{$product->price}}</h6>
                            <!-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> -->
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{url('/view_product/'.$product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <form action="{{url('/add-to-cart')}}" method="post" >
                        {{ csrf_field() }}
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <button type="submit" href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>

        <!-- Offer Start -->
        @include('frontend.offer')
    <!-- Offer End -->
    @include('frontend.top_products')
@endsection

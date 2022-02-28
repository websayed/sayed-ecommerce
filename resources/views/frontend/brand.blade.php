<div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
        @foreach($brands as $brand)
            <a href="">
            <div class="col-lg-2 col-md-6 col-sm-6 pb-1">
                <div class="cat-item d-flex flex-column border p-3 mb-4" >
                    <!-- <p class="text-right">15 Products</p> -->
                    <a href="{{url('/product_by_brn/'.$brand->id)}}" class="cat-img position-relative overflow-hidden mb-3">
                    <!-- <img width="60" height="60" src="{{asset('upload/brand_photos')}}/{{$brand->image}}" alt="image"> -->
                    </a>
                    <h5 class="text-dark font-weight-semi-bold m-0">{{Str::limit($brand->name,15)}}</h5>
                </div>
            </div>
            </a>
        @endforeach

        </div>
    </div>


        <!-- Navbar Start -->
        <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
   
                    @foreach($categories as $category)
                        <a href="{{url('/product_by_cat/'.$category->id)}}" class="nav-item nav-link"><i class="fa fa-angle-right mr-3"></i>{{$category->name}}</a>
                    @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0" style="width: calc(100% - 30px); z-index: 1;"> 
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

            <li><a href="{{url('/cus-logout')}}" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">{{Session::get('name')}}</span>

                </a></li>
            @else
                <li><a href="{{url('/login-check')}}" class="btn border d-inline">
                <i class="fas fa-sign-in-alt text-primary"></i>
                </a></li>
            @endif                        
                <!-- 
                 -->
                
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <!-- Navbar End -->



@extends('admin.admin_master')
@section('admin_content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order detiles</h1>
            <!-- <a href="{{url('sliders/create')}}" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add slider</a> -->
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                 <div class="row">
                      <div class="col-5">
                      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>custo name</th>
                      <th>custo mobile</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>custo name</th>
                      <th>custo mobile</th>                     
                    </tr>
                  </tfoot>
           
                  <tbody>
                    <tr>
                        <td>{{$orders->customer->name}}</td> 
                        <td>{{$orders->customer->mobile}}</td>                
                    </tr>

                  </tbody>
                


                </table>
              </div>
                      </div>
                      <div class="col-7">
                      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>user</th>
                      <th>sipping</th>
                      <th>mobile</th>
                      <th>emile</th>
                      <th>prement</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>user</th>
                      <th>sipping</th>
                      <th>mobile</th>
                      <th>emile</th>
                      <th>prement</th>                    
                    </tr>
                  </tfoot>
             
                  <tbody>
                    <tr>
                       <td>{{$orders->shipping->name}}</td>  
                       <td>{{$orders->shipping->address}}</td> 
                       <td>{{$orders->shipping->mobile}}</td> 
                       <td>{{$orders->shipping->email}}</td>  
                       <td>{{$orders->shipping->payment_method}}</td> 
                    </tr>

                  </tbody>
                  



                </table>
              </div>
                      </div>
                 </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>order id</th>
                      <th>product name</th>
                      <th>product price</th>
                      <th>Quntity</th>
                      <th>total</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>order id</th>
                      <th>product name</th>
                      <th>product price</th>
                      <th>Quntity</th>
                      <th>total</th>                     
                    </tr>
                  </tfoot>
                  
                  <tbody>
                       @foreach($order_by_id as $order_by)
                    <tr>
                         <td>{{$order_by->order_id}}</td> 
                         <td>{{$order_by->product_name}}</td>           
                         <td>{{$order_by->product_price}}</td>           
                         <td>{{$order_by->product_sales_quantity}}</td>   
                         <td>{{$order_by->product_price*$order_by->product_sales_quantity}}</td>         
                    </tr>
                        @endforeach
                       
                  </tbody>
                  
                 



                </table>
                <h3 class="text-right"> Total amount ৳ {{$orders->total}}</h3>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

     
      <!-- End of Main Content -->
@endsection
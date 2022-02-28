

@extends('admin.admin_master')
@section('admin_content')
<!-- End of Main Content -->
<div id="wrapper">
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="text-uppercase text-center font-weight-bold text-primary">This is Product page</h6>
            <a href="{{url('products/create')}}" class="float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-solid fa-plus"></i> Add Product</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>C-Name</th>
                    <th>B-Name</th>
                    <th>P-Name</th>
                    <th>D-S</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Code</th>
                    <th>C-Name</th>
                    <th>B-Name</th>
                    <th>P-Name</th>
                    <th>D-S</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($products as $product)
                  @php
                  $product['image']=explode('|',$product->image);
                  @endphp
                  <tr>
                    <td>{{$product->code}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->brand->name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{Str::limit($product->description,20)}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>
                      @foreach($product->image as $image)
                      <img src="{{asset('/image/'.$image)}}" style="width: 50px;height: 50px;">
                      @endforeach
                    </td>
                    <td class="center">
                      @if($product->status==1)
                      <a href="{{url('/product-status'.$product->id)}}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-down"></i></a>
                      @else
                      <a href="{{url('/product-status'.$product->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-up"></i></a>
                      @endif
                      <a class="btn btn-sm btn-info" href="{{url('/products/'.$product->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                      <form class="d-inline" action="{{url('/products/'.$product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
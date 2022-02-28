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
            <h6 class="text-uppercase text-center font-weight-bold text-primary">This is Brand page</h6>
            <h2 class="m-0 font-weight-bold text-primary"><span>Total Order</span> {{$total_order}}</h2>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>o id</th>
                    <th>c name</th>
                    <th>total</th>
                    <th>date</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>o id</th>
                    <th>c name</th>
                    <th>total</th>
                    <th>date</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{Str::title($order->customer->name)}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                    <td class="center">
                      @if($order->status==1)
                      <a href="{{url('/order-status'.$order->id)}}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-down"></i></a>
                      @else
                      <a href="{{url('/order-status'.$order->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-up"></i></a>
                      @endif
                      <a class="btn btn-sm btn-info" href="{{url('/view-order/'.$order->id)}}"><i class="fa fa-edit"></i></a>
                      <form class="d-inline" action="{{url('/orders/'.$order->id)}}" method="post">
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
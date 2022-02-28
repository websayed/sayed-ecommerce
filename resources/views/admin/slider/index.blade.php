


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
            <h6 class="text-uppercase text-center font-weight-bold text-primary">This is slider page</h6>
            <a href="{{url('sliders/create')}}" class="float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-solid fa-plus"></i> Add Brand</a>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>date</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>date</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($sliders as $slider)
                  <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->name}}</td>
                    <td>{{$slider->description}}</td>
                    <td>{{$slider->created_at}}</td>
                    <td><img width="80" height="60" src="{{asset('/storage/'.$slider->image)}}" alt="image"></td>
                    <td class="center">
                      @if($slider->status==1)
                      <a href="{{url('/slider-status'.$slider->id)}}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-down"></i></a>
                      @else
                      <a href="{{url('/slider-status'.$slider->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-up"></i></a>
                      @endif
                      <a class="btn btn-sm btn-info" href="{{url('/sliders/'.$slider->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                      <form class="d-inline" action="{{url('/sliders/'.$slider->id)}}" method="post">
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
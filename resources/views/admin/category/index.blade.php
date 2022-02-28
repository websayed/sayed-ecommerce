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
            <h6 class="text-uppercase text-center font-weight-bold text-primary">This is category page</h6>
            <h6 class="float-left text-primary d-sm-inline-block">Total category="{{$total_user}}"</h6>

            <a href="{{url('categories/create')}}" class="float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-solid fa-plus"></i> Add Brand</a>

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
                  @foreach($categories as $category)
                  <tr>
                  
                    <td>{{$category->id}}</td>
                    <td>{{Str::title($category->name)}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{\Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                    <td><img style="width: 40px;" src="{{asset('upload/photos')}}/{{$category->image}}" alt=""></td>
                    <td class="center">
                      @if($category->status==1)
                      <a href="{{url('/category-status'.$category->id)}}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-down"></i></a>
                      @else
                      <a href="{{url('/category-status'.$category->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-up"></i></a>
                      @endif
                      <a class="btn btn-sm btn-info" href="{{url('/categories/'.$category->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                      <form class="d-inline" action="{{url('/categories/'.$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                      </form>
                    </td>
                    @endforeach
                  </tr>
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
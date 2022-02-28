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
            <h6 class="float-left text-primary d-sm-inline-block">Total category=""</h6>

            <a href="{{url('contact-create')}}" class="float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-solid fa-plus"></i> Add Brand</a>

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
                  @foreach($contacts as $contact)
                  <tr>
                    
                      <td>{{$contact->id}}</td>
                      <td>{{$contact->contact_name}}</td>
                      <td>{{$contact->contact_email}}</td>
                      <td>{{$contact->contact_description}}</td>
                      <td>
                           <img style="width: 40px;" src="{{asset('upload/contact_photos')}}/{{$contact->contact_image}}" alt="">
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

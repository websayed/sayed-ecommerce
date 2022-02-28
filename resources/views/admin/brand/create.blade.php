@extends('admin.admin_master')
@section('admin_content')

<script>
    @if(Session::has('message'))
    toastr.options=
    {
         "closeButton" :true,
         "progressBar" :true,
    }
    toastr.success('{{Session('message')}}');
    @endif
 </script>
<div class="row">
    <div class="col">
        <div class="card">
        <div class="card-header py-3">
            <h6 class="text-uppercase text-center font-weight-bold text-primary">This is Brand page</h6>
            <a href="{{url('brands')}}" class="float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-border-all mr-2"></i> All Brand</a>
          </div>
            <div class="card-body">
                <div class="category mt-4">
                    <form action="{{url('/brands')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Name</label>
                            <input type="text" id="simpleinput" class="form-control" name="name" require>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-textarea" class="form-label">Description</label>
                            <textarea class="form-control" id="example-textarea" rows="5" name="description" require></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Image</label>
                            <input type="file" id="simpleinput" class="form-control" name="image" require>
                           
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck11" name="status" require>
                                <label class="form-check-label" for="customCheck11">checkbox</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
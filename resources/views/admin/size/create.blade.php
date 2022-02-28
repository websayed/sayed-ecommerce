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
            <h6 class="text-uppercase text-center font-weight-bold text-primary">This is sizes page</h6>
            <a href="{{url('sizes')}}" class="float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-border-all mr-2"></i> Add sizes</a>
          </div>
            <div class="card-body">
                <div class="category mt-4">
                    <form action="{{url('/sizes')}}" method="post" enctype="multipart/form-data">
                        @csrf                       
                        <div class="mb-3">
                        <label for="simpleinput" class="form-label">size</label>
                        <input type="text" id="simpleinput" class="form-control" name="size" id="input" data-role="tagsinput" require>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
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
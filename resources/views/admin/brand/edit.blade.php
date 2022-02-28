@extends('admin.admin_master')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Edit brand</h1>
            <a href="{{url('brands')}}" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>show brands</a>
          </div>

<div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    
                    <p class="alert-success">
                    <?php

                    $message = Session::get('message');
                    if($message)
                    {
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </div>
                <div class="card-body">
                <div class="category mt-4">
                <form action="{{url('/brands/'.$brand->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  
              
                    <div class="mb-3">
                        <input hidden type="text" name="brand_id" value="{{$brand->id}}">
                        <label for="simpleinput" class="form-label">Name</label>
                        <input type="text" id="simpleinput" class="form-control" name="name" value="{{$brand->name}}" require>
                    </div>

                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="description" require>{{$brand->description}}</textarea>
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

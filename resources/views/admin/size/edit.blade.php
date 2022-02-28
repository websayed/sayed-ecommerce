@extends('admin.admin_master')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Edit size</h1>
            <a href="{{url('sizes')}}" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>show size</a>
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
                <form action="{{url('/sizes/'.$size->id)}}" method="post" >
                @csrf
                @method('PUT')
                  
              
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">size</label>
                        <input type="text" id="simpleinput" class="form-control" name="size" id="input" data-role="tagsinput" value="{{implode(',',Json_decode($size->size))}}" require>
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

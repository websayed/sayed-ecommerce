@extends('admin.admin_master')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add product</h1>
            <a href="{{url('products')}}" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Show Products</a>
          </div>

<div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">

                <p>
                <?php

                    $message = Session::get('message');
                    if($message)
                    {
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </p>
                </div>
                <div class="card-body">
                <div class="category mt-4">
                <form action="{{url('/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">select category</label>
                        <div class="control">
                             <select class="form-control" name="category" id="">
                                  <option value="">Select Category</option>
                                   @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option> 
                                  @endforeach                              
                              </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">select Brand</label>
                        <div class="control">
                             <select class="form-control" name="brand" id="">
                                  <option value="">Select Brand</option>
                                   @foreach($brands as $brand)
                                  <option value="{{$brand->id}}">{{$brand->name}}</option> 
                                  @endforeach                              
                              </select>
                        </div>
                    </div>                 

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Select Unit</label>
                        <div class="control">
                             <select class="form-control" name="unit" >
                                  <option value="">Select unit</option>
                                   @foreach($units as $unit)
                                  <option value="{{$unit->id}}">{{$unit->name}}</option> 
                                  @endforeach                              
                              </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">select size</label>
                        <div class="control">
                             <select class="form-control" name="size">
                                  <option value="">Select size</option>
                                   @foreach($sizes as $size)
                                  <option value="{{$size->id}}">{{$size->size}}</option> 
                                  @endforeach                              
                              </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name</label>
                        <input type="text" id="simpleinput" class="form-control" name="name" value="{{$product->name}}" require>
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">price</label>
                        <input type="text" id="simpleinput" class="form-control" name="price" value="{{$product->price}}" require>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">code</label>
                        <input type="text" id="simpleinput" class="form-control" value="{{$product->code}}" name="code" require>
                    </div>

                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="description" require>{{$product->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Image</label>
                        <input type="file" id="simpleinput" class="form-control"  name="file[]" multiple required>
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

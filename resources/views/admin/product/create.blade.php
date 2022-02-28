@extends('admin.admin_master')
@section('admin_content')

<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
    }
    toastr.success('{{Session('
        message ')}}');
    @endif
</script>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="text-uppercase text-center font-weight-bold text-primary">This is product page</h6>
                <a href="{{url('products')}}" class="float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-border-all mr-2"></i> Add product</a>
            </div>
            <div class="card-body">
                <div class="category mt-4">
                    <form action="{{url('/products')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">select category</label>
                            <div class="control">
                                <select class="form-control" name="category" id="">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Select Unit</label>
                            <div class="control">
                                <select class="form-control" name="unit" id="">
                                    <option value="">Select unit</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">select size</label>
                            <div class="control">
                                <select class="form-control" name="size" id="">
                                    <option value="">Select size</option>
                                    @foreach($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                    @endforeach
                                </select>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Name</label>
                            <input type="text" id="simpleinput" class="form-control" name="name" require>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">price</label>
                            <input type="text" id="simpleinput" class="form-control" name="price" require>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">code</label>
                            <input type="text" id="simpleinput" class="form-control" name="code" require>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-textarea" class="form-label">Description</label>
                            <textarea class="form-control" id="example-textarea" rows="5" name="description" require></textarea>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Image</label>
                            <input type="file" id="simpleinput" class="form-control" name="file[]" multiple required>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck11" name="status" require>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <label class="form-check-label" for="customCheck">checkbox</label>

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
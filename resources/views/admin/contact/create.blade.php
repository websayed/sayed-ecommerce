@extends('admin.admin_master')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
            <a href="{{url('contact-show')}}" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>show category</a>
   </div>

          <div class="row">
            <div class="col">
            <div class="card">
               
                <div class="card-body">
                <div class="category mt-4">
                   
                <form action="{{url('/contact')}}" method="post" enctype="multipart/form-data">
                @csrf
                  
              
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name</label>
                        <input type="text" id="simpleinput" class="form-control" name="contact_name" value="{{old('name')}}" require>                     
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name</label>
                        <input type="email" id="simpleinput" class="form-control" name="contact_email" value="{{old('name')}}" require>                     
                    </div>
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="contact_description" require></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name</label>
                        <input type="file" id="simpleinput" class="form-control" name="contact_image" require>                     
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

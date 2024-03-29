@extends('admin.layouts.main')

@section('content')
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
          </div>

          <div class="row justify-content-center">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="col-lg-10">
              <!-- Form Basic -->
              <form action="{{route('category.update', [$category->id])}}" method="POST" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input  id="name" name = "name"
                        placeholder="Enter name of category" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror">

                          @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control @error('description') is-invalid @enderror" >{{$category->description}}</textarea>

                          @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    </div>
                    
                    <div class="form-group">
                      <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">

                        <br/>
                        <img src="{{Storage::url($category->image)}}" width="150">

                          @error('image')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror

                          <button  class="btn btn-primary mt-3">Update</button>

                    
                      </div>
                      
                   
                    
                    </div>

                   
                     

                    
                    
                  </form>
                </div>
              </div>

              </form>
            </div>
            
          </div>
   
</div> 

@endsection

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
            <div class="col-lg-10">
              <!-- Form Basic -->
              <form action="{{route('category.store')}}" method="post">@csrf
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input  id="name" aria-describedby="emailHelp"
                        placeholder="Enter name of category" class="form-control @error('name') is-invalid @enderror">

                          @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control @error('description') is-invalid @enderror"></textarea>

                          @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    </div>
                    
                    <div class="form-group">
                      <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">

                        @error('image')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

              </form>
            </div>
            
          </div>
   
</div> 

@endsection

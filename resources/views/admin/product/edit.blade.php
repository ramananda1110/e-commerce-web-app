@extends('admin.layouts.main')

@section('content')
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
          </div>

          <div class="row justify-content-center">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="col-lg-10">
              <!-- Form Basic -->
              <form action="{{route('product.update', [$product->id])}}" method="POST" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input  id="name" name = "name"
                        placeholder="Enter name of product" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror">

                          @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror" >
                        {!!$product->description!!}
                      </textarea>

                          @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    </div>
                    
                    <div class="form-group">
                      <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                          <center> <img src="{{Storage::url($product->image)}}" width="100px">
                          </center>
                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">

                          @error('image')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="name">Price</label>
                      <input  id="name" name = "price" type="number"
                        placeholder="price of product" class="form-control @error('price') is-invalid @enderror" value ="{{$product->price}}">

                          @error('price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    
                    </div>

                    <div class="form-group">
                      <label for="additional_info">Additional information</label>
                      <textarea id="summernote1" name="additional_info" class="form-control @error('additional_info') is-invalid @enderror" >
                       {!!$product->additional_info!!}
                      </textarea>

                          @error('additional_info')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                    </div>


                    <div class="form-group">
                      <div class="custom-file">
                        <label>Choose Category</label>
                        <select class="form-control @error('category') is-invalid @enderror" name="category">
                            <option value="">Select Category</option>
                            @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}"
                                @if($category->id==$product->category_id)selected @endif>{{$category->name}}
                              </option>
                            @endforeach
                        </select>
                    
                        @error('category')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <div class="custom-file">
                        <label>Choose Subcategory</label>
                        <select class="form-control @error('subcategory') is-invalid @enderror" name="subcategory">
                            <option value="">Select</option>
                          
                        </select>
                    
                       
                      </div>
                      
                    </div>

                    <div class="form-group" >
                      <button  class="btn btn-primary">Submit</button>

                    </div>
                    
                  </form>
                </div>
              </div>

              </form>
            </div>
            
          </div>
   
</div> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script type="text/javascript">
      $('document').ready(function(){
          $('select[name="category"]').on('change', function(){
             var catId = $(this).val();

              if(catId){
                $.ajax({
                  url:'/subcategories/'+catId,
                  type:"GET",
                  dataType:"json",
                  success: function(data){
                    $('select[name="subcategory"]').empty();
                    $.each(data, function(key, value){
                      $('select[name="subcategory"]').append(
                        '<option value="'+key+'">'+value+'</option>'
                      );
                    })
                  }
                })
              } else {
                $('select[name="subcategory"]').empty();
              }
             
          });
      });
   </script> 

@endsection

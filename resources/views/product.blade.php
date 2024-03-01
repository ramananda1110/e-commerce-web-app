@extends('layouts.app')

@section('content')
<div class="container">
<main>

<section class="py-5 text-center container">
  <div class="row justify-content-center">
    
        <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @if(count($sliders)>0)
            @foreach($sliders as $key=> $slider)

            <div class="carousel-item {{$key == 0 ? 'active' : ''}} ">
              <img src="{{Storage::url($slider->image)}}" >
            </div>
            @endforeach
            @endif
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </div>
</section>

<h2>Category</h2>
@foreach(App\Models\Category::all() as $cat)
     <a href="{{route('product.list', [$cat->slug])}}"><button class="btn btn-secondary">{{$cat->name}}</button>
      </a>
    @endforeach

<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <h2>Products</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
     
    @foreach($products as $product)
      <div class="col">
        <div class="card shadow-sm">
           <img src="{{Storage::url($product->image)}}" height="200" style="width: 100%; height: 200px"> 
          <div class="card-body">
            <p><b>{{$product->name}}</b></p>
            <p class="card-text">{!! Str::limit(strip_tags($product->description), 120) !!}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{route('product.view',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-success">View</button> </a>
                <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button> </a>
              </div>
              <small class="text-body-secondary">৳{{$product->price}}</small>
            </div>
          </div>
        </div>
      </div>

     @endforeach
    </div>
  </div>

  <center>
      <a href="{{route('more.product')}}"> <button class="btn btn-success">More Product</button>
          
    
      </a>
  </center>

</div>


<div class="jumbotron">
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="row">
        @foreach($randomActiveProducts as $product)
            
          <div class="col-4">
              
                <div class="card shadow-sm">
                  <img src="{{Storage::url($product->image)}}" height="20" style="width: 100%; height: 250px"> 
                  <div class="card-body">
                    <p><b>{{$product->name}}</b></p>
                    <p class="card-text">{!! Str::limit(strip_tags($product->description), 120) !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="{{route('product.view',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-success">View</button> </a>
                        <a href="{{route('add.cart',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
                      </div>
                      <small class="text-body-secondary">৳{{$product->price}}</small>
                    </div>
                  </div>
                </div>
            
             
          </div>
          @endforeach   
        </div>
    </div>
    <div class="carousel-item">
        <div class="row">
          @foreach($randomItemProducts as $product)
            <div class="col-4">
                  <div class="card shadow-sm">
                    <img src="{{Storage::url($product->image)}}" height="200" style="width: 100%; height: 200px"> 
                    <div class="card-body">
                      <p><b>{{$product->name}}</b></p>
                      <p class="card-text">{!! Str::limit(strip_tags($product->description), 120) !!}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="{{route('product.view',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-success">View</button> </a>
                          <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
                        </div>
                        <small class="text-body-secondary">৳{{$product->price}}</small>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach   
        </div>
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>

</main>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
<main>

<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Album example</h1>
      <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </div>
</section>

<h2>Category</h2>
@foreach(App\Models\Category::all() as $cat)
    <button class="btn btn-secondary">{{$cat->name}}</button>
    @endforeach

<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <h2>Products</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
     
      @foreach($products as $product)
      <div class="col">
        <div class="card shadow-sm">
           <img src="{{Storage::url($product->image)}}"> 
          <div class="card-body">
            <p><b>{{$product->name}}</b></p>
            <p class="card-text">{{Str::limit($product->description), 120}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-success">View</button>
                <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
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

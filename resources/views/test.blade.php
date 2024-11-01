@extends('layouts.app')

@section('content')

<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
    <li class="nav-item me-2">
        <a class="btn btn-outline-primary border-2 active" href="{{ route('products.category', ['category' => 'Coffee']) }}">Coffee</a>
    </li>
    <li class="nav-item me-2">
        <a class="btn btn-outline-primary border-2" href="{{ route('products.category', ['category' => 'Ice Cream']) }}">Ice Cream</a>
    </li>
    <li class="nav-item me-0">
        <a class="btn btn-outline-primary border-2" href="{{ route('products.category', ['category' => 'Desserts']) }}">Desserts</a>
    </li>
    <li class="nav-item me-2">
        <a class="btn btn-outline-primary border-2" href="{{ route('products.category', ['category' => 'Breakfast']) }}">Breakfast</a>
    </li>
    <li class="nav-item me-0">
        <a class="btn btn-outline-primary border-2" href="{{ route('products.category', ['category' => 'Juice']) }}">Juice</a>
    </li>
</ul>

                </div>
    
<div id="tab-1" class="tab-pane fade show p-0 active">
    <div class="row g-4">
    @php
            $products = \App\Models\Product::all();
        @endphp
        @if ($products->isEmpty())
            <p>No products found in this category.</p>
        @else
            @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('images/'.$product->image) }}" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$product->Discount}}$</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">{{$product->ProductName}}</a>
                            @if($product->category)
                                <p>Category:  {{$product->category->CategoryName}}</p>  
                            @else
                                <span class="text-danger">No Category</span>
                            @endif
                            <span class="text-primary me-1">{{$product->PriceAfterDiscount}}</span>
                            <span class="text-body text-decoration-line-through">{{$product->PriceBeforeDiscount}}</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <form style="display: inline-block;" action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <small class="w-50 text-center py-2">
                                    <a class="text-body btn " href="" type="submit"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                </small>
                            </form>
                            <form style="display: inline-block;" method="POST" action="{{ Auth::check() && $product->wishlist()->where('user_id', Auth::id())->exists() ? route('wishlist.remove', $product->id) : route('wishlist.add', $product->id) }}">
                                @csrf
                                <button type="submit" class="wishlist-icon" style="background: none; border: none;">
                                    <i class="{{ Auth::check() && $product->wishlist()->where('user_id', Auth::id())->exists() ? 'fa-solid' : 'fa-regular' }} fa-heart" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

  </div>
          
        </div>
    </div>



@endsection

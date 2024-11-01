@extends('layouts.app')

@section('content')




<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
        <div class="col-lg-6">

<div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
    <h1 class="display-5 mb-3">Your Wishlist </h1>
   
@if ($wishlists->isEmpty())
    <p>You have no items in your wishlist.</p>
@else
</div>
</div>

    <div id="wishlist">
        @foreach ($wishlists as $wishlistItem)
            <div class="product-item">
                <img src="{{ asset('images/'.$wishlistItem->product->image) }}">
                <p>Name: {{$wishlistItem->product->ProductName}}</p>
                <p>Category: {{ $wishlistItem->product->category ? $wishlistItem->product->category->CategoryName : 'No Category' }}</p>
                <p>Price: <span class="current-price">{{$wishlistItem->product->PriceAfterDiscount}}$</span> <span class="old-price">{{$wishlistItem->product->PriceBeforeDiscount}}$</span></p>
                <p>Description: {{$wishlistItem->product->description}}</p>
                <p>Quantity: {{$wishlistItem->product->quantity}}</p>
                <form style="display: inline-block;" method="POST" action="{{ route('wishlist.remove', $wishlistItem->product_id) }}">
                    @csrf
                    <button type="submit" class="wishlist-icon" style="background: none; border: none;">
                        <i class="fa-solid fa-heart" aria-hidden="true"></i>
                    </button>
                </form> 
            </div>
        @endforeach
    </div>
@endif
</div></div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="cart-item"> 
        <div class="cart-item-details">
            <img src="{{ asset('images/'. $product->image) }}" alt="{{ $product->ProductName }}" class="product-image">
            <p>{{ $product->ProductName }}</p>
        </div>

        <div class="quantity-price">
            <p>Description: {{ $product->description }}</p>
            <p>Price Before Discount: ${{ $product->PriceBeforeDiscount }}</p>
            <p>Discount: {{ $product->Discount }}%</p>
            <p>Price After Discount: ${{ $product->PriceAfterDiscount }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn custom-btn smoothscroll me-2 mb-2">Go Back</a>
</div>

@endsection

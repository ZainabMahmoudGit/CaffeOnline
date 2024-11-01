

@extends('layouts.app')

@section('content')


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
           
<div class="col-lg-6">

                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Your Cart </h1>
                    @if ($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else   
      </div>
            </div>
   

                             
        <div id="cartItems">
            @php
                $totalPrice = 0;
            @endphp
            @foreach ($cartItems as $item)
                @php
                    $itemTotalPrice = $item->product->PriceAfterDiscount * $item->quantity;
                    $totalPrice += $itemTotalPrice;
                @endphp
                
                <div class="cart-item"> 
                    <div class="cart-item-details">
                        <img src="{{ asset('images/'. $item->product->image) }}" alt="{{ $item->product->name }}" class="product-image">
                        <p>{{ $item->product->ProductName }}</p>
                    </div>

                    <div class="quantity-price">
                        <form method="POST" action="{{ route('cart.update', $item->product->id) }}">
                            @csrf
                            @method('patch')
                            <label for="quantity">Quantity: </label>
                            <select name="quantity" onchange="this.form.submit()">
                                @for ($i = 1; $i <= 10; $i++) <!-- Limit to 10 or customize -->
                                    <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </form>

                        <span>Price: ${{ $item->product->PriceAfterDiscount }}</span>
                    </div>

                    <form method="POST" action="{{ route('cart.destroy', $item->product->id) }}" style="display:inline-block">
                        @csrf
                        @method('delete')
                        <button id="checkoutButton" type="submit">Remove</button>
                    </form>
                </div>
            @endforeach
        </div>
 
        <div class="tprice">
    <p>TOTAL PRICE: $<span id="totalPrice">{{ $totalPrice }}</span></p>
    <form method="POST" action="{{ route('payment') }}">
    @csrf
    <input type="hidden" name="total" value="{{ $totalPrice }}">
    <button type="submit" id="checkoutButton" style="display: inline;">CHECKOUT</button>
</form>

</div>


    @endif
    </div>
    </div></div>
@endsection

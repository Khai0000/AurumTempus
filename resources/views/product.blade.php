@extends('layout')

@section('title', 'Discover our Collection')

@section('content')
<div class="filterContainer">
    <h1>Products</h1>
    <div class="buttonContainer">
        <button>All</button>
        <button>Men</button>
        <button>Women</button>
        <button>Stainless Steel</button>
        <button>Leather</button>
    </div>
</div>

<div class="productGrid">
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch1-removebg-preview.png') }}" alt="Stirling Analog White Dial Watch">
        </div>
        <div class="productDetails">
            <h2>Stirling Analog White Dial Watch</h2>
            <p><span class="old-price">$250.00 USD</span><span class="price">$210.00 USD</span></p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch2-removebg-preview.png') }}" alt="Black Stainless Steel Women Watch">
        </div>
        <div class="productDetails">
            <h2>Black Stainless Steel Women Watch</h2>
            <p class="price">$210.00 USD</p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch3-removebg-preview.png') }}" alt="Classic Petite Cornwall Women Watch">
        </div>
        <div class="productDetails">
            <h2>Classic Petite Cornwall Women Watch</h2>
            <p class="price">$110.00 USD</p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch4-removebg-preview.png') }}" alt="The Octagon With Leather Strap Watch">
        </div>
        <div class="productDetails">
            <h2>The Octagon With Leather Strap Watch</h2>
            <p class="price">$190.00 USD</p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch5-removebg-preview.png') }}" alt="The Octagon With Leather Strap Watch">
        </div>
        <div class="productDetails">
            <h2>The Octagon With Leather Strap Watch</h2>
            <p class="price">$190.00 USD</p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch6-removebg-preview.png') }}" alt="The Octagon With Leather Strap Watch">
        </div>
        <div class="productDetails">
            <h2>The Octagon With Leather Strap Watch</h2>
            <p class="price">$190.00 USD</p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch1-removebg-preview.png') }}" alt="Stirling Analog White Dial Watch">
        </div>
        <div class="productDetails">
            <h2>Stirling Analog White Dial Watch</h2>
            <p><span class="old-price">$250.00 USD</span><span class="price">$210.00 USD</span></p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch2-removebg-preview.png') }}" alt="Black Stainless Steel Women Watch">
        </div>
        <div class="productDetails">
            <h2>Black Stainless Steel Women Watch</h2>
            <p class="price">$210.00 USD</p>
        </div>
    </div>
    <div class="product">
        <div class="imageContainer">
            <img src="{{ asset('assets/watch3-removebg-preview.png') }}" alt="Classic Petite Cornwall Women Watch">
        </div>
        <div class="productDetails">
            <h2>Classic Petite Cornwall Women Watch</h2>
            <p class="price">$110.00 USD</p>
        </div>
    </div>
</div>

<div class="productPageIndicator">
    <div class="pageNumber">
        1/3
    </div>
    <div class="productButtonContainer">
        <button>
            Next >
        </button>
    </div>
</div>
@endsection

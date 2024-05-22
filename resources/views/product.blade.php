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
    @foreach($watches as $watch)
    <a href="{{ url('products/' . $watch->id) }}" class="product-link">
        <div class="product">
            <div class="imageContainer">
                <img class="productImage" src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->title }}">
            </div>
            <div class="productDetails">
                <h2>{{$watch->title}}</h2>
                <p class="price">RM {{$watch->price}}</p>
            </div>
        </div>
    </a>
    @endforeach
</div>

<div class="productPageIndicator">
    <div class="prevButtonContainer">
        @if(!$watches->onFirstPage())
        <a href="{{ $watches->previousPageUrl() }}">
            <button class="nextButton">< Prev</button>
        </a>
        @endif
    </div>
    <div class="pageNumber">
        {{ $watches->currentPage() }}/{{ $watches->lastPage() }}
    </div>
    <div class="nextButtonContainer">
        @if($watches->hasMorePages())
        <a href="{{ $watches->nextPageUrl() }}">
            <button class="nextButton">Next ></button>
        </a>
        @endif
    </div>
</div>
@endsection

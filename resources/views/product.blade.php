@extends('layout')

@section('title', 'Discover our Collection')

@section('content')
<div class="filterContainer">
    <h1>Products</h1>
    <div class="buttonContainer">
        <button id="allButton" onclick="filterWatches('All',this)">All</button>
        <button onclick="filterWatches('Men',this)">Men</button>
        <button onclick="filterWatches('Women',this)">Women</button>
        <button onclick="filterWatches('Stainless Steel',this)">Stainless Steel</button>
        <button onclick="filterWatches('Leather',this)">Leather</button>
    </div>
    @if(auth()->user()->role =='admin')
        <button class="addNewProductButton" id="addNewProductButton" onclick="directToAddProductPage()">Add New Product</button>
    @endif
</div>

<div class="productGrid" id="productGrid">
    @foreach($watches as $watch)
    <a href="{{ url('products/' . $watch->id) }}" class="product-link" data-tags="{{ $watch->tag }}">
        <div class="product" data-tags="{{ $watch->tag }}">
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
<script>
    function directToAddProductPage() {
        window.location.href = '/upload/product';
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        const button = document.getElementById('allButton');
        filterWatches('All', button);
    });

    function filterWatches(tag,button) {
        let products = document.querySelectorAll('.product');
        products.forEach(product => {
            if (tag === 'All' || product.dataset.tags===tag) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });

        document.querySelectorAll('.buttonContainer button').forEach(button => {
            button.classList.remove('selected');
        });

        button.classList.add('selected');
    }
</script>
@endsection

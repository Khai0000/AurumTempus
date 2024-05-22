@extends('layout')

@section('title', 'Aurum Tempus')

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <h1>Discover our collection</h1>
        <p>Your one-stop shop for the latest and greatest in the world of watches.</p>
        <div class="gender-preference">
            <span>Browse our products:</span>
            <a href="/products">
                <div class="buttons">
                    <button class="btn">Browse</button>
                </div>
            </a>
        </div>
    </div>
    <div class="hero-image">
        <img src="{{ asset('assets/HD-wallpaper-person-wearing-black-analog-watch.jpg') }}" alt="Watch">
    </div>
</div>

<div class="dividerContainer">
    <div class="divider"></div>
</div>

<div class="previewContainer">
    <div class="previewHeaderContainer">
        <h2>Trending products</h2>
        <a href="/products">View All</a>
    </div>
    <div class="grid">
        @foreach($watches as $watch)
        <div class="product" onclick="redirectToProductDetails('{{ $watch->id }}')">
            <div class="imageContainer">
                <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->title }}">
            </div>
            <div class="productDetails">
                <h2>{{$watch->title}}</h2>
                <p class="price">RM {{$watch->price}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="dividerContainer">
    <div class="divider"></div>
</div>

<div class="aboutUsContainer">
    <div class="aboutUsTitle">
        <h2>Aurum Tempus's Technology:</h2>
        <h3>Brilliance in every detail,</h3>
        <h3>Redefined precision,</h3>
        <h3>Creation & excellence.</h3>
        <p>Aurum Tempus combines state-of-the-art technology<br> with masterful craftsmanship to create watches
            that are a true work of art.</p>
        <p>From concept to creation, Aurum Tempus integrates cutting-edge technology<br> with classic
            watchmaking techniques to deliver superior performance and style.</p>
    </div>
</div>

<div class="advertiserContainer">
    <h2>1 Year Warranty</h2>
    <h2>Zero-waste design</h2>
    <h2>Eco vegan friendly</h2>
    <h2>Timeless Design</h2>
    <h2>Recycled stainless steel</h2>
</div>

<div class="blogContainer">
    <h2>Aurum Tempus Times</h2>
    <div class="blogGrid">
        <div class="blogPost">
            <img src="{{ asset('assets/blog1.jpg') }}" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
        <div class="blogPost">
            <img src="{{ asset('assets/blog2.jpg') }}" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
        <div class="blogPost">
            <img src="{{ asset('assets/blog3.jpg') }}" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
    </div>
</div>

<script>
    function redirectToProductDetails(productId) {
        window.location.href = '/products/' + productId;
    }
</script>

@endsection

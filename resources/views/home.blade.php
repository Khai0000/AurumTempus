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
        <div class="product" onclick="directToProductDetails('{{ $watch->id }}')">
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
        @foreach ($blogs as $blog)
            <div class="blogPost" onclick="directToBlogDetails('{{$blog->id}}')">
                <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}"/>
                <div class="blogDetails">
                    <div>{{$blog->date}}</div>
                    <div>/</div>
                    <div>{{$blog->author}}</div>
                </div>
                <h3>{{$blog->title}}</h3>
            </div>
        @endforeach
    </div>
</div>

<script>
    function directToProductDetails(productId) {
        window.location.href = 'products/' + productId;
    }

    function directToBlogDetails(blogId){
        window.location.href = 'blog/' + blogId;
    }
</script>

@endsection

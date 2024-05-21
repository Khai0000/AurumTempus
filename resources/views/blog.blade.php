@extends('layout')

@section('title', 'Our Blog')

@section('content')
<h1 class="blogTitle">
    Our Latest Blog
</h1>

<div class="blogContainer">
    <div class="blogGrid">
        <div class="blogPost">
            <img src="{{ asset('assets/blog1.jpg') }}" alt="Blog post image 1" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
        <div class="blogPost">
            <img src="{{ asset('assets/blog2.jpg') }}" alt="Blog post image 2" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
        <div class="blogPost">
            <img src="{{ asset('assets/blog3.jpg') }}" alt="Blog post image 3" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
        <div class="blogPost">
            <img src="{{ asset('assets/blog1.jpg') }}" alt="Blog post image 1" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
        <div class="blogPost">
            <img src="{{ asset('assets/blog2.jpg') }}" alt="Blog post image 2" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
        <div class="blogPost">
            <img src="{{ asset('assets/blog3.jpg') }}" alt="Blog post image 3" />
            <div class="blogDetails">
                <div>May 2, 2023</div>
                <div>/</div>
                <div>Charlie Wong</div>
            </div>
            <h3>Luxury watch brands ranking in 2024</h3>
        </div>
    </div>
</div>
@endsection

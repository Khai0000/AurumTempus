@extends('layout')

@section('title', 'Our Blog')

@section('content')
<div class="blogHeaderContainer">
    <h1 class="blogTitle">
        Our Latest Blog
    </h1>
    @if(auth()->user()->role =='admin')
        <button class="addNewBlogButton" id="addNewBlogutton" onclick="directToAddBlogPage()">Add New Blog</button>
    @endif
</div>

<div class="blogContainer">
    <div class="blogGrid">
        @foreach ($blogs as $blog)
            <div class="blogPost" onclick="directToBlogDetails('{{ $blog->id }}')">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog post" />
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
    function directToAddBlogPage() {
        window.location.href = '/upload/blog';
    }

    function directToBlogDetails(blogId) {
        window.location.href = '/blog/' + blogId;
    }
</script>
@endsection

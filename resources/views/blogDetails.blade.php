@extends('layout')

@section('title', 'Blog')

@section('content')
<div class="blogDetailsContainer">
    <img src="{{asset('storage/'.$blog->image)}}" />
    <h2>{{$blog->title}}</h2>
    <p>
        {!! nl2br(e($blog->body)) !!}
    </p>
</div>  

<div class="blogBioInfoContainer">
    <div class="bioInfoContainer">
        <span class="columnHead">Category</span>
        <span>{{$blog->category}}</span>
    </div>
    <div class="bioInfoContainer">
        <span class="columnHead">Date</span>
        <span>{{$blog->date}}</span>
    </div>
    <div class="bioInfoContainer">
        <span class="columnHead">Author</span>
        <span>{{$blog->author}}</span>
    </div>
</div>

<div class="blogBioInfoButtonContainer">
    @if(auth()->user()->role == 'admin')
    <button class="blogEditButton" onclick="directToBlogEditPage('{{ $blog->id }}')">Edit</button>
    <form id="deleteForm_{{ $blog->id }}" action="/blog/{{ $blog->id }}/delete" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="button" class="blogDeleteButton" onclick="confirmDelete({{ $blog->id }})">Delete</button>
    </form>
@endif
</div>
<script>

    function confirmDelete(id) {
        let confirmation = confirm("Are you sure you want to delete this blog?");
        if (confirmation) {
            document.getElementById('deleteForm_' + id).submit();
        }
    }

    function directToBlogEditPage(blogId) {
        window.location.href = '/blog/' + blogId + '/edit';
    }
</script>
@endsection

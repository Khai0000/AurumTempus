@extends('layout')

@section('title', 'Edit Blog')

@section('content')
<div class="uploadProductContainer">
    <div class="uploadProductImageContainer">
        @if ($blog->image)
            <img id="previewImage" src="{{ asset('storage/' . $blog->image) }}" />
        @else
            <img id="previewImage" src="" style="display: none;" />
            <p id="placeholderText">Please Upload a Photo</p>
        @endif
    </div>
    <div class="uploadProductDetailsContainer">
        <form action="/blog/{{ $blog->id }}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Edit Blog</h2>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $blog->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" id="author" value="{{ $blog->author }}" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" name="date" class="form-control" id="date" value="{{ $blog->date }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group">
                <label for="tag">Category</label>
                <input type="text" name="category" class="form-control" id="tag" value="{{ $blog->category }}" required>
            </div>
            <div class="form-group">
                <label for="content">Body</label>
                <textarea name="body" class="form-control" id="body" rows="10" required>{{ $blog->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewImage = document.getElementById('previewImage');
        const placeholderText = document.getElementById('placeholderText');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
                placeholderText.style.display = 'none';
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.src = '';
            previewImage.style.display = 'none';
            placeholderText.style.display = 'block';
        }
    });
</script>
@endsection

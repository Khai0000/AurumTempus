@extends('layout')

@section('title', 'Upload Blog')

@section('content')
<div class="uploadProductContainer">
    <div class="uploadProductImageContainer">
        <img id="previewImage" src="" style="display: none;"/>
        <p id="placeholderText">Please Upload a Photo</p>
    </div>
    <div class="uploadProductDetailsContainer">
        <form action="/create/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Upload New Blog</h2>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" id="author" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" name="date" class="form-control" id="date" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control" id="category" required>
            </div>
            
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" name="body" class="form-control" id="body" required rows="10"></textarea>
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

@extends('layout')

@section('title', 'Edit Product')

@section('content')
<div class="uploadProductContainer">
    <div class="uploadProductImageContainer">
        @if ($watch->image)
            <img id="previewImage" src="{{ asset('storage/' . $watch->image) }}" />
        @else
            <img id="previewImage" src="" style="display: none;" />
            <p id="placeholderText">Please Upload a Photo</p>
        @endif
    </div>
    <div class="uploadProductDetailsContainer">
        <form action="/products/{{ $watch->id }}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Edit Product</h2>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $watch->title }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ $watch->price }}" required>
            </div>
            <div class="form-group">
                <label for="material_type">Material Type</label>
                <input type="text" name="material_type" class="form-control" id="material_type" value="{{ $watch->material_type }}" required>
            </div>
            <div class="form-group">
                <label for="origin">Origin</label>
                <input type="text" name="origin" class="form-control" id="origin" value="{{ $watch->origin }}" required>
            </div>
            <div class="form-group">
                <label for="strap_color">Strap Color</label>
                <input type="text" name="strap_color" class="form-control" id="strap_color" value="{{ $watch->strap_color }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $watch->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" name="tag" class="form-control" id="tag" value="{{ $watch->tag }}" required>
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

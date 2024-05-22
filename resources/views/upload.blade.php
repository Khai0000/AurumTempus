@extends('layout')

@section('title', 'Upload Product')

@section('content')
<form action="/upload/product" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" id="price" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="material_type">Material Type</label>
        <input type="text" name="material_type" class="form-control" id="material_type" required>
    </div>
    <div class="form-group">
        <label for="origin">Origin</label>
        <input type="text" name="origin" class="form-control" id="origin" required>
    </div>
    <div class="form-group">
        <label for="strap_color">Strap Color</label>
        <input type="text" name="strap_color" class="form-control" id="strap_color" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" class="form-control" id="quantity" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" id="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

@extends('layouts.dashboard')
@section('content')

<form action="{{ route('products.store') }}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="for-label" for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label class="for-label" for="name">Product slug</label>
        <input type="slug" class="form-control" id="slug" name="slug" required>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-control">Category</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach ($categories as $category )
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="brand_id" class="form-control">Brand</label>
        <select class="form-control" id="brand_id" name="brand_id">
            @foreach ($brands as $brand )
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="for-label" for="price">Product Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label class="for-label" for="stock">Product Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
     <div class="mb-3">
        <label class="for-label" for="descripton">Product Description</label>
        <textarea type="text" class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label class="for-label" for="image">Product Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-success">Add New Product</button>
</form>
@endsection
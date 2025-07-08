@extends('layouts.dashboard')
@section('content')

<form action="{{ route('brands.store') }}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="for-label" for="name">Brand Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
   
    <div class="mb-3">
        <label class="for-label" for="image">Brand Image</label>
        <input type="file" class="form-control" id="logo" name="logo" required>
    </div>
    <button type="submit" class="btn btn-success">Add New Brand</button>
</form>
@endsection
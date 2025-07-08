@extends('layouts.dashboard')
@section('content')

<form action="{{ route('categories.store') }}" method="Post" >
    @csrf
    <div class="mb-3">
        <label class="for-label" for="name">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label class="for-label" for="slug">Category Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required>
    </div>
   

    <button type="submit" class="btn btn-success">Add New Category</button>
</form>
@endsection
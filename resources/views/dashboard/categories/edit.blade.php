@extends('layouts.dashboard')
@section('content')
<div class="container mt-4">
    <h2>update</h2>
    <form action="{{ route('categories.update',$category->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name"> Category Name:</label>
        <input type="text"class="form-control" id="name" name="name" value="{{ $category->name }}"required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div> 

@endsection
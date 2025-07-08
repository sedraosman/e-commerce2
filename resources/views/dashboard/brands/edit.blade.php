@extends('layouts.dashboard')
@section('content')
<div class="contanier mt-4">
    <h1>Update barnd</h1>
    <form  action="{{ route('brands.update',$brand->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for ="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $brand->name }}"required>
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">logo</label>
            <input type="file" class="form-control" id="logo" name="logo" >
        <img src="{{ asset('storage/'.$brand->logo) }}" width="50">
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
</div>

@endsection

@extends('layouts.dashboard');
@section('content')

<h1>Manage products</h1>

<a href="{{ route('products.create') }}"
class ="btn btn-dark"> Add New Product</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
        <tr>
            <td><img src="{{ asset('storage/'. $product->image) }}" width="50" alt=""></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td><a href="" class="btn btn-warninng">Edit</a>
            <form action="" method>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
@endsection
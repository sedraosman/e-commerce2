@extends('layouts.dashboard')
@section('content')
<h1>Manage Brand</h1>
<a href ="{{ route('brands.create') }}" class="btn btn-dark">Add new Brand</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Logo</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand )
        <tr>
            <td><img src="{{ asset('storage/' .$brand->logo) }}" width="50" alt=""></td>
        <td>{{ $brand->name }}</td>
       
        <td><a href="{{ route('brands.edit',$brand->id) }}" class="btn btn-warning">Edit</a>
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
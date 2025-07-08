@extends('layouts.dashboard')
@section('content')
<h1>Manage Category</h1>
<a href="{{ route('categories.create') }}" class="btn btn-dark">Add New Category</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
            <tr>
                <td>{{ $category->name }}</td>

                <td><a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning">Edit</a>
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
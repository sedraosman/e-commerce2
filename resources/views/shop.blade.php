@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h1 class="text-center">Top product</h1>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-3">
            <div class="card mb-4">
                <img src="{{ asset('storage/'.$product->image) }}"class="card-img-top">
                <div class="card-bodye">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->price }}</p>
                <form action="{{ route('cart.add',$product->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark">Add to cart</button>
                </form>
            </div>
            </div>
        </div>
    
    @endforeach</div>
</div>
@endsection
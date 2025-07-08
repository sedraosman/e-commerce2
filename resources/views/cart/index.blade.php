@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="text-center">Cart !!</h2>
    @if (session('cart') && count(session('cart'))>0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach (session('cart') as $id=>$product )
            <tr>
                <td>
                    <img src="{{ asset('storage/' .$product['image']) }}" width="50" alt="">
                </td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>
                    <form action="{{ route('cart.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="number" name="quantity" value="{{ $product['quantity'] }}"
                        min="1" class="form-control" style="width:80px">
                        <button type="submit" class="btn btn-dark">Update Cart</button>
                    </form>
                </td>
                <td>${{ $product['price'] * $product['quantity'] }}</td>
                <td>
                    <form action="{{ route('cart.remove',$id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">remove?</button>
                    </form>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('checkout') }}" class="btn btn-success">Place Order</a>

    <br>
    <br>
    <a href="{{ route('shop') }}" class="btn btn-dark">Go Back!</a>

    @else
    <h1 class="text-center"><b>Your order has been placed Successfully!</b></h1>
    <a href="{{ route('shop') }}" class="btn btn-dark">Go Back!</a>

    
    @endif
</div>

@endsection
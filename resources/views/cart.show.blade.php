<!-- resources/views/cart/show.blade.php -->

@extends('layout')  <!-- Đảm bảo rằng bạn đang kế thừa từ một layout nếu có -->

@section('content')
    <h1>Your Cart</h1>
    
    @if(count($cart) > 0)
        <ul>
            @foreach($cart as $item)
                <li>{{ $item['product']->name }} - Quantity: {{ $item['quantity'] }}</li>
            @endforeach
        </ul>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection

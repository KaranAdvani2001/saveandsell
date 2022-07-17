@extends('layouts.app')


@section('title', 'SaveAndSell')
    


@section('content')
    <p>The Products for sale:</p>
    <ul>
        @foreach ($products as $product)

        <li><a href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->name }}</a></li>

        @endforeach

    </ul>
    
@endsection    
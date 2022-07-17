@extends('layouts.app')


@section('title', 'Product details')
    


@section('content')
    <ul>
        <li>Category: {{ $product->category->name }}</li>

        <li>Name: {{ $product->name }}</li>

        <li>Descrption: {{ $product->description }}</li>

        <li>Size: {{ $product->size }}</li>

        <li>Price: {{ $product->price }}</li>

        <li>Quantity: {{ $product->quantity }}</li>

    </ul>
    
@endsection 
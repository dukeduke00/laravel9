@extends('layout')

@section("nazivStranice")
    Prodavnica
@endsection


@section("sadrzajStranice")
    <p>Dobrodosli u moj Shop</p>


    @foreach($allProducts as $product)
        <a href="{{ route('product.single', $product->id) }}">
        {{ $product->name }}
        </a>
        <br>
        {{ $product->description }}
        <br>
        Kolicina: {{ $product->amount }}
        <br>
        Cijena: {{ $product->price }}
        <br><br>
    @endforeach


@endsection

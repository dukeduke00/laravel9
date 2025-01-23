@extends('layout')

@section('nazivStranice')
    Uredi Proizvod
@endsection

@section('sadrzajStranice')

    <form  style="margin: 100px 600px"  class=" d-flex justify-content-center gap-3 flex-column" method="POST" action="{{ route('product.save', ['product' => $product->id]) }}">

        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger"> {{ $error }}</p>
                @endforeach

            @endif
        </div>

        {{ csrf_field() }}
        <input name="name" type="text" placeholder="Unesite naziv proizvoda" value="{{ $product->name }}">
        <input name="description" type="text" placeholder="Unesite opis" value="{{ $product->description }}">
        <input name="amount" type="number" placeholder="Unesite kolicinu proizvoda" value="{{ $product->amount }}">
        <input name="price" type="number" step="0.01" placeholder="Unesite cijenu " value="{{ $product->price }}">
        <input name="image" type="text" placeholder="Unesite fotografije" value="{{ $product->image }}">

        <button>Izmijeni podatke proizvoda</button>
    </form>

@endsection

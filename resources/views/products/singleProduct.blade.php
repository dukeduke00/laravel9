@extends('layout')


@section('sadrzajStranice')

    <div class="container m-5">
        <div class="card" style="width: 24rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h6 class="text-primary">Cijena: {{ $product->price }} &euro;</h6>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Nazad</a>
            </div>

            <form method="POST" action="{{ route('cart.add') }}">

                @csrf

                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="text" name="amount" placeholder="Enter amount">
                <button>Add to cart</button>
            </form>
        </div>
    </div>


@endsection

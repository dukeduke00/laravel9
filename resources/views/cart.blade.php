@extends("layout")

@section("sadrzajStranice")


 @foreach($products as $product)
     @foreach($cart as $item)
         @if($item['product_id'] == $product->id)
             <p>Ime proizvoda: {{ $product->name }}</p>
             <p>Kolicina: {{ $item['amount'] }}</p>
         @endif
     @endforeach



 @endforeach

@endsection

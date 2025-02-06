@extends("layout")

@section("sadrzajStranice")


 @foreach($combinedItems as $item)
     <p>Ime: {{ $item['name'] }}</p>
     <p>Kolicina: {{ $item['amount'] }}</p>
     <p>Cijena: {{ $item['price'] }}</p>
     <p>Ukupna cijena: {{ $item['total'] }}</p>
     <hr>
 @endforeach

@endsection

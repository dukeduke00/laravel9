@extends("layout")

@section("nazivStranice")
    Svi proizvodi
@endsection

@section("sadrzajStranice")



    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allProducts as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
                <td>
                    <a href="{{ route('product.delete', ['product' => $product->id]) }}"  class="btn btn-danger">Delete</a>
                    <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

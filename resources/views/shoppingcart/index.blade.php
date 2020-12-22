@extends('layouts.app')

@section('content')

    <h2>View your Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    {{-- <th>Quantity</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shoppingcartItems as $item)
                <tr>
                    <td scope="row">{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    {{-- <td>{{ $item->quantity }}</td> --}}
                    <td>
                        <a href="{{ route('shoppingcart.destroy',$item->id) }}">Delete</a>
                        {{-- <a href=""></a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h3>
            Total Price : MWK  {{ \Cart::session(auth()->id())->getTotal()}}
            <a href="" class="btn btn-primary">Check Out</a>
        </h3>
@endsection

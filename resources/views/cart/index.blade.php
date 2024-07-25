@extends('layouts.app')
@section('title')
    Index
@endsection
@if (session('user') != null)
    @section('userName')
        Wlecome {{ session('user') }}
    @endsection
@endif

</div>
@section('content')
    <h1 class="h1 text-center m-t4">All Product</h1>
    <table class="table mt-4">
        <?php $amountPrice = 0; ?>
        <thead>
            <tr class="text-center">
                <th scope="col">Product Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cart as $cartItem)
                <tr class="text-center">
                    <th scope="col" class="align-middle">{{ $cartItem->product->Product_name }}</th>
                    <th scope="col" class=" align-middle ">
                        <div class="" style="max-width: 200px !important ;    max-height: 150px !important;">
                            <img src="{{ asset($cartItem->Product->imgpath) }}" alt="{{ $cartItem->Product->imgpath }}"
                                style="max-height: 120px !important">

                        </div>
                    </th>
                    <th scope="col" class="align-middle">{{ $cartItem->Product->price }} EGP</th>
                    <th scope="col" class="align-middle">{{ $cartItem->quantity }} Piece</th>
                    <th scope="col" class="align-middle">{{ $cartItem->total_price }} EGP</th> {{-- Product has one Category --}}
                </tr>
                <?php $amountPrice = $amountPrice + $cartItem->total_price; ?>
            @endforeach

        </tbody>
    </table>
    <h3>Amount Price : {{ $amountPrice }} EGP</h3>
    <a href="{{ route('cart.cash') }}" class="btn btn-primary">Cash On Delivery</a>
@endsection

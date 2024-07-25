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
    <div class="row mb-5 mt-5">
        @foreach ($Product as $Product)
            <div class="col-sm-3 mb-5">
                <div class="card " style="min-height: 100%">
                    <img class="card-img-top mw-100 mh-100" style="width: 100% ;height:300px"
                        src="{{ asset($Product->imgpath) }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{ $Product->Product_name }}</h4>
                        <h5 class="card-title">{{ $Product->Category->Category_name }}</h5>
                        <h6 class="card-title">{{ $Product->price }} EGP</h6>
                        @if ($Product->quantity != 0)
                            <h6 class="card-title">{{ $Product->quantity }} In Stock</h6>
                        @else
                            <h6 class="card-title" style="color: red">out Stock</h6>
                        @endif
                        <p class="card-text " style="max-height: 25px; overflow: hidden">
                            {{ $Product->description }}
                        </p>
                        @if ($Product->quantity != 0)
                            <form method="post" action="{{ route('users.addToCart', $Product->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="quantity mr-6">Quantity Of Pieces</label>
                                    <input type="number" step="1" max="{{ $Product->quantity }}" min="1"
                                        value="1" name="quantity"
                                        class="quantity-field border-1   border-light-subtle rounded-3 text-center w-25">
                                </div>
                                <button type="submit" class="btn btn-primary inline-block">Add To Cart</button>

                            </form>
                        @else
                            <h6 class="card-title" style="color: red">This Proudect is out Stock</h6>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

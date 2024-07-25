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
    <div class="text-center mt-4">
        <a href="{{ route('products.Create') }}" class="btn btn-success">Create Product</a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Dscription</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Product as $Product)
                <tr class="text-center">
                    <th scope="col" class="align-middle">{{ $Product->id }}</th>
                    <th scope="col" class="align-middle">{{ $Product->Product_name }}</th>
                    <th scope="col " class="align-middle" style="max-width: 200px; overflow:hidden ;">
                        {{ $Product->description }}</th>
                    <th scope="col" class="align-middle">{{ $Product->price }}</th>
                    <th scope="col" class="align-middle">{{ $Product->quantity }}</th>
                    <th scope="col" class="align-middle">{{ $Product->Category->Category_name }}</th>
                    {{-- Product has one Category --}}
                    <th scope="col" class=" align-middle ">
                        <div class="" style="max-width: 200px !important ;    max-height: 150px !important;">
                            <img src="{{ asset($Product->imgpath) }}" alt="{{ $Product->imgpath }}"
                                style="max-height: 120px !important">

                        </div>
                    </th>
                    <th scope="col " class="align-middle text-center">
                        <a href="{{ route('products.show', $Product->id) }}" class="btn btn-info">Veiw</a>
                        <a href="{{ route('products.edit', $Product->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('products.destroy', $Product->id) }}"class="btn btn-danger">Delete </a>
                    </th>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

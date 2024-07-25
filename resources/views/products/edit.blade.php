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
    <h1 class="h1 text-center m-t4">Update Product</h1>
    <div class=" mt-4 w-50">
        <form method="post" action="{{ route('products.update', $Product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product Name"
                name="ProductName" value="{{ $Product->Product_name }}">

            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="description"
                name="Dscription" value="{{ $Product->description }}">

            <label for="exampleFormControlInput1">Price</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="price" name="Price"
                value="{{ $Product->price }}">

            <label for="exampleFormControlInput1">Quantity</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="quantity" name="Quantity"
                value="{{ $Product->quantity }}">

            <label for="exampleFormControlInput1">Category</label>
            <select class="form-select" name="Category" id="Category">

                @foreach ($Category as $Category)
                    <option value="{{ $Category->id }}" name="{{ $Category->Category_name }}">{{ $Category->Category_name }}
                    </option>
                @endforeach
            </select>

            <label for="exampleFormControlInput1">Image</label>
            <input type="file" class="form-control" id="imagePath" placeholder="Enter your Image" name="imagePath"
                value="{{ old('imagePath') }}">
            <button type="submit" class="btn btn-info mt-4">Update Product</button>
        </form>
    </div>
@endsection

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
    <h1 class="h1 text-center m-t4">ADD Product</h1>

    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="exampleFormControlInput1">ProductName</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your ProductName"
            name="ProductName" value="{{ old('ProductName') }}">

        <label for="exampleFormControlInput1">Dscription </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Dscription"
            name="Dscription" value="{{ old('Dscription') }}">

        <label for="exampleFormControlInput1">Price</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Price"
            name="Price" value="{{ old('Price') }}">

        <label for="exampleFormControlInput1">Quantity</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Quantity"
            name="Quantity" value="{{ old('Quantity') }}">

        <label for="exampleFormControlInput1">Category</label>
        <select class="form-select" name="Category" id="Category">
            @foreach ($Category as $Category)
                <option value="{{ $Category->id }}" name="{{ $Category->Category_name }}">{{ $Category->Category_name }}
                </option>
            @endforeach
        </select>
        <label for="exampleFormControlInput1">Image</label>
        <input type="file" class="form-control" id="Image" placeholder="Enter your Image" name="Image"
            value="{{ old('Image') }}">

        <button type="submit" class="btn btn-danger mt-4">Create Product</button>
    </form>
@endsection

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
    <h1 class="h1 text-center m-t4">Show Product</h1>
    <div class=" mt-4  w-50 m-auto form-control p-5 warning">
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
        <label class="form-control" for="exampleFormControlInput1">{{ $Product->Product_name }}</label>

        <label for="exampleFormControlInput1">Description</label>
        <label class="form-control" for="exampleFormControlInput1" id="floatingTextarea2"
            style="height: 100px">{{ $Product->description }}</label>

        <label for="exampleFormControlInput1">Price</label>
        <label class="form-control" for="exampleFormControlInput1">{{ $Product->price }}</label>

        <label for="exampleFormControlInput1">Quantity</label>
        <label class="form-control" for="exampleFormControlInput1">{{ $Product->quantity }}</label>

        <label for="exampleFormControlInput1">Category</label>
        <label class="form-control" for="exampleFormControlInput1">{{ $Product->Category->Category_name }}</label>

        <label for="exampleFormControlInput1">Image</label>
        <label class="form-control" for="exampleFormControlInput1">{{ $Product->imgpath }}</label>
    </div>
@endsection

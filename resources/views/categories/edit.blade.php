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
    <h1 class="h1 text-center m-t4">Update category</h1>
    <div class=" mt-4">
        <form method="post" action="{{ route('categories.update', $Category->id) }}">
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

            <label for="exampleFormControlInput1">Category Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Category Name"
                name="CategoryName" value="{{ $Category->Category_name }}">
            <button type="submit" class="btn btn-info mt-4">Update Category</button>
        </form>
    </div>
@endsection

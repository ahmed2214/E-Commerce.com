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
    <h1 class="h1 text-center m-t4">All categories</h1>
    <div class="text-center mt-4">
        <a href="{{ route('categories.Create') }}" class="btn btn-success">Create Category</a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="text-center">
                    <th scope="col">{{ $category->id }}</th>
                    <th scope="col">{{ $category->Category_name }}</th>
                    <th scope="col text-center">
                        <a href="#" class="btn btn-info">Veiw</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        {{-- <a href="{{ route('categories.destroy', $category->id) }}"class="btn btn-danger">Delete </a> --}}
                        <form form class="d-inline-block" method="POST"
                            action="{{ route('categories.destroy', $category->id) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </th>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection

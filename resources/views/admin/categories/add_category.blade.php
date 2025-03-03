@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="mb-3 container mt-5">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2 class="text-center mb-4">Add Category</h2>

    <form action="{{ route('create_category') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control"
                id="category_name" name="category_name" value="" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<hr>
<section class="mt-5 container">
    @if($categories->isEmpty())
    <h2>No Available Categories added</h2>
    @else
    <h4>Available Categories</h4>
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Category Name</td>
            <td>Action</td>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    <hr>
</section>

@endsection
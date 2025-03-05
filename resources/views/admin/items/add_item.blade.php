@extends('layouts.app')
@section('title', 'Items Dashboard')

@section('content')
<section class="mt-5 container">
    @if($items)
    <h4>Available Items</h4>
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Item Name</td>
            <td>Description</td>
            <td>Category</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Product Image</td>
            <td>Action</td>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->category_id }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td><img style="width: 100%; height: 90px; object-fit: contain;" src="{{ asset('storage/' . $item->image) }}" alt=""></td>
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
    @else
    <h3>No available items</h3>
    @endif
    <hr>
</section>
<section>
    <div class="container my-3">
        <div class="card shadow-lg">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add New Product</h4>
            </div>
            @if(session('success'))
            <div class="mt-2 text-center alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('create_item') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Product Description</label>
                        <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option selected disabled>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4">Save Product</button>
                        <button type="reset" class="btn btn-secondary px-4">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
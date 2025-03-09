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
            <td id="">{{ $item->id }}</td>
            <td id="grid-item-name{{ $item->id }}">{{ $item->name }}</td>
            <td id="grid-item-description{{ $item->id }}">{{ $item->description }}</td>
            <td id="grid-item-category_name{{ $item->id }}">{{ $item->category_name }}</td>
            <td id="grid-item-quantity{{ $item->id }}">{{ $item->quantity }}</td>
            <td id="grid-item-price{{ $item->id }}">{{ $item->price }}</td>
            <td id="grid-item-image{{ $item->id }}"><img style="width: 100%; height: 90px; object-fit: contain;" src="{{ asset('storage/' . $item->image) }}" alt=""></td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" data-bs-toggle="modal" onclick="$('#modal-feedback-msg{{ $item->id }}').addClass('d-none');" data-bs-target="#Modal{{$item->id}}">Edit</button></li>
                        <li><button class="dropdown-item text-danger" href="#">Delete</button></li>
                    </ul>
                </div>
            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="Modal{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal{{$item->id}}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modal{{$item->id}}Label">Edit item: {{ $item->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_form_item{{ $item->id }}" enctype="multipart/form-data">
                            <div id="modal-feedback-msg{{ $item->id }}" class="d-none mt-2 text-center alert alert-success" role="alert">

                            </div>
                            @csrf
                            <div class="mb-3">
                                <label for="edit_product_name{{ $item->id }}" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="edit_product_name{{ $item->id }}" name="edit_product_name{{ $item->id }}" value="{{ $item->name }}" placeholder="Enter product name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_product_description{{ $item->id }}" class="form-label">Product Description</label>
                                <input type="text" class="form-control" id="edit_product_description{{ $item->id }}" name="edit_product_description{{ $item->id }}" value="{{ $item->description }}" placeholder="Enter product description" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_category{{ $item->id }}" class="form-label">Category</label>
                                <select class="form-select" id="edit_category{{ $item->id }}" name="edit_category{{ $item->id }}" required>
                                    <option selected disabled>Select Category</option>
                                    @foreach($categories as $category)
                                    <option {{ $item->category_id == $category->id ? 'selected' :'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="edit_quantity{{ $item->id }}" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="edit_quantity{{ $item->id }}" name="edit_quantity{{ $item->id }}" value="{{ $item->price }}" placeholder="Enter quantity" min="1" required>
                            </div>

                            <div class="mb-3">
                                <label for="edit_price{{ $item->id }}" class="form-label">Price ($)</label>
                                <input type="number" class="form-control" id="edit_price{{ $item->id }}" name="edit_price{{ $item->id }}" value="{{ $item->price }}" placeholder="Enter price" required>
                            </div>

                            <div class="mb-3">
                                <label for="edit_image{{ $item->id }}" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="edit_image{{ $item->id }}" name="edit_image{{ $item->id }}" accept="image/*">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" onclick="updateItem('{{ $item->id }}')" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>

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
                        <button type="reset" class="btn btn-secondary px-4">Reset</button>
                        <button type="submit" class="btn btn-success px-4">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/item.js') }}"></script>
@endsection
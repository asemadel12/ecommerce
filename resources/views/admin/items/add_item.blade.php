@extends('layouts.app')
@section('title', 'Items Dashboard')

@section('content')
<section class="mt-5 container">
    <h4>Available Items</h4>
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Item Name</td>
            <td>Category</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Product Image</td>
            <td>Action</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Winter Jacket</td>
            <td>Jacket</td>
            <td>52</td>
            <td>40$</td>
            <td><img style="width: 100%; height: 90px; object-fit: contain;" src="https://www.dfranklincreation.com/cdn/shop/files/DFTXPUF005-BLAC-10_1125x.jpg?v=1727275777" alt=""></td>
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
    </table>
    <hr>
</section>
<section>
    <div class="container my-3">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add New Product</h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="product_name" placeholder="Enter product name" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option selected disabled>Select Category</option>
                            <option value="Jacket">Jacket</option>
                            <option value="Shirt">Shirt</option>
                            <option value="Shoes">Shoes</option>
                            <option value="Accessories">Accessories</option>
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
                        <label for="productImage" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="productImage" name="image" accept="image/*" required>
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
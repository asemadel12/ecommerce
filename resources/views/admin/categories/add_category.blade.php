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

    <form action="{{ route('create_category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control"
                id="category_name" name="category_name" value="{{ old('category_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<hr>
<section class="mt-5 container">
    <div id="delete-category-msg" class="d-none alert alert-success">
    </div>
    @if($categories->isEmpty())
    <h2>No Available Categories added</h2>
    @else
    <h4>Available Categories</h4>
    <input type="hidden" name="__token" content="{{ csrf_token() }}">
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Category Name</td>
            <td>Category Image</td>
            <td>Action</td>
        </tr>
        @php $i = 0 @endphp
        @foreach($categories as $category)
        <tr id="table-category-row-{{ $category->id }}">
            <td>{{ ++$i }}</td>
            <td id="table-category-name{{ $category->id }}">{{ $category->name }}</td>
            <td id="table-category-image{{ $category->id }}"><img style="width: 100%; height: 90px; object-fit: contain;" src="{{ asset('storage/' . $category->image) }}" alt=""></td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button type="button" class="dropdown-item" data-bs-toggle="modal" onclick="$('#edit-form-messages-container{{ $category->id }}').empty()" data-bs-target="#Modal{{ $category->id }}">Edit</button></li>
                        <li><button onclick="deleteCategory('{{ $category->id }}')" class="dropdown-item text-danger">Delete</button></li>
                    </ul>
                </div>

            </td>
        </tr>
        <!-- update data modal -->
        <div class="modal fade" id="Modal{{ $category->id }}" tabindex="-1" aria-labelledby="Modal{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modal{{ $category->id }}">Edit Category {{ $category->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_form_category{{ $category->id }}" action="" method="POST">
                            @csrf
                            <div style="color: red;" id="edit-form-messages-container{{ $category->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="category_name_edit{{ $category->id }}" class="form-label">Category Name</label>
                                <input type="text" class="form-control"
                                    id="category_name_edit{{ $category->id }}" name="category_name_edit{{ $category->id }}" value="{{ $category->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_image{{ $category->id }}" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="edit_image{{ $category->id }}" name="edit_image{{ $category->id }}" accept="image/*">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="editCategory('{{ $category->id }}')">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        @endforeach
    </table>
    @endif

    <hr>
</section>

<script src="{{ asset('js/category.js') }}"></script>
@endsection
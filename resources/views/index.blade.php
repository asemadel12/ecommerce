@extends('layouts.app')

@section('title', 'Home')


@section('content')
<style>
    .card-img-top {
        width: 100%;
        height: 300px;
        object-fit: cover;
        /* Ensures the image covers the area without distorting */
    }
</style>
<section>
    <div class="container mt-4">
        <h2 class="text-center mb-4 bg-light">Best Seller</h2>

        <div class="row">
            <!-- Item 9 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://www.dfranklincreation.com/cdn/shop/files/DFTXPUF005-BLAC-10_1125x.jpg?v=1727275777" class="card-img-top" alt="Pink Skirt">
                    <div class="card-body">
                        <h5 class="card-title">Pink Skirt</h5>
                        <p class="card-text">A cute pink skirt perfect for summer.</p>
                        <p class="card-text"><strong>Price:</strong> $25</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Item 10 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://www.dfranklincreation.com/cdn/shop/files/DFTXPUF005-BLAC-10_1125x.jpg?v=1727275777" class="card-img-top" alt="Brown Boots">
                    <div class="card-body">
                        <h5 class="card-title">Brown Boots</h5>
                        <p class="card-text">Stylish brown boots for winter wear.</p>
                        <p class="card-text"><strong>Price:</strong> $55</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Item 11 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://www.dfranklincreation.com/cdn/shop/files/DFTXPUF005-BLAC-10_1125x.jpg?v=1727275777" class="card-img-top" alt="Orange Scarf">
                    <div class="card-body">
                        <h5 class="card-title">Orange Scarf</h5>
                        <p class="card-text">A warm orange scarf for cold weather.</p>
                        <p class="card-text"><strong>Price:</strong> $12</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Item 12 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://www.dfranklincreation.com/cdn/shop/files/DFTXPUF005-BLAC-10_1125x.jpg?v=1727275777" class="card-img-top" alt="Purple Blazer">
                    <div class="card-body">
                        <h5 class="card-title">Purple Blazer</h5>
                        <p class="card-text">A formal purple blazer for business meetings.</p>
                        <p class="card-text"><strong>Price:</strong> $75</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
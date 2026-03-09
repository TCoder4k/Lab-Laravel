@extends('layouts.client')

@section('title', 'Product Details - Electro')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/store') }}">Store</a></li>
                        <li class="active">Product Detail</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('electro/img/product01.png') }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2 col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('electro/img/product01.png') }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">${{ number_format($product->price, 2) }}</h3>
                            @if($product->stock > 0)
                                <span class="product-available">In Stock ({{ $product->stock }} available)</span>
                            @else
                                <span class="product-available" style="color:#e74c3c">Out of Stock</span>
                            @endif
                        </div>
                        <p>{{ $product->description ?? 'No description available for this product.' }}</p>

                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" value="1" min="1" max="{{ $product->stock }}">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <button class="add-to-cart-btn" {{ $product->stock == 0 ? 'disabled' : '' }}>
                                <i class="fa fa-shopping-cart"></i> add to cart
                            </button>
                        </div>

                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li>
                                @if($product->category)
                                    <a href="{{ route('client.store', ['category' => $product->category->id]) }}">{{ $product->category->name }}</a>
                                @else
                                    <a href="{{ route('client.store') }}">Uncategorized</a>
                                @endif
                            </li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab-description">Description</a></li>
                            <li><a data-toggle="tab" href="#tab-details">Details</a></li>
                            <li><a data-toggle="tab" href="#tab-reviews">Reviews</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-description" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $product->description ?? 'No description available for this product.' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-details" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" style="max-width:400px">
                                            <tr><th>Name</th><td>{{ $product->name }}</td></tr>
                                            <tr><th>Price</th><td>${{ number_format($product->price, 2) }}</td></tr>
                                            <tr><th>Stock</th><td>{{ $product->stock }}</td></tr>
                                            <tr><th>Category</th><td>{{ $product->category ? $product->category->name : 'Uncategorized' }}</td></tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-reviews" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>No reviews yet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product tab -->
            </div>
        </div>
    </div>
    <!-- /SECTION -->

    <!-- RELATED PRODUCTS -->
    @if($related->isNotEmpty())
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>
                @foreach($related as $rel)
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            @if($rel->image)
                                <img src="{{ asset($rel->image) }}" alt="{{ $rel->name }}">
                            @else
                                <img src="{{ asset('electro/img/product01.png') }}" alt="{{ $rel->name }}">
                            @endif
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $rel->category ? $rel->category->name : 'Uncategorized' }}</p>
                            <h3 class="product-name">
                                <a href="{{ route('client.product', $rel->id) }}">{{ $rel->name }}</a>
                            </h3>
                            <h4 class="product-price">${{ number_format($rel->price, 2) }}</h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- /RELATED PRODUCTS -->
@endsection

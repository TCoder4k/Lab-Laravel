@extends('layouts.client')

@section('title', 'Electro - Home')

@section('content')
    <!-- CATEGORY BANNERS -->
    <div class="section">
        <div class="container">
            <div class="row">
                @forelse($categories as $index => $cat)
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            @if($cat->image)
                                <img src="{{ asset($cat->image) }}" alt="{{ $cat->name }}">
                            @else
                                <img src="{{ asset('electro/img/shop0' . ($index + 1) . '.png') }}" alt="{{ $cat->name }}">
                            @endif
                        </div>
                        <div class="shop-body">
                            <h3>{{ $cat->name }}</h3>
                            <a href="{{ route('client.store', ['category' => $cat->id]) }}" class="cta-btn">
                                Shop now <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                @for($i = 1; $i <= 3; $i++)
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('electro/img/shop0' . $i . '.png') }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Collection</h3>
                            <a href="{{ route('client.store') }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endfor
                @endforelse
            </div>
        </div>
    </div>
    <!-- /CATEGORY BANNERS -->

    <!-- NEW PRODUCTS -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="products-slick" data-nav="#slick-nav-new">
                        @forelse($newProducts as $product)
                        <div class="product">
                            <div class="product-img">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('electro/img/product01.png') }}" alt="{{ $product->name }}">
                                @endif
                                <div class="product-label">
                                    @if($product->stock <= 5 && $product->stock > 0)
                                        <span class="sale">Low stock</span>
                                    @endif
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category ? $product->category->name : 'Uncategorized' }}</p>
                                <h3 class="product-name">
                                    <a href="{{ route('client.product', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">${{ number_format($product->price, 2) }}</h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                        @empty
                            <p class="text-muted text-center">No products available.</p>
                        @endforelse
                    </div>
                    <div id="slick-nav-new" class="products-slick-nav"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /NEW PRODUCTS -->

    <!-- HOT DEAL -->
    <div id="hot-deal" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li><div><h3>02</h3><span>Days</span></div></li>
                            <li><div><h3>10</h3><span>Hours</span></div></li>
                            <li><div><h3>34</h3><span>Mins</span></div></li>
                            <li><div><h3>60</h3><span>Secs</span></div></li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="{{ route('client.store') }}">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /HOT DEAL -->

    <!-- TOP SELLING -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top Selling</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="products-slick" data-nav="#slick-nav-top">
                        @forelse($topProducts as $product)
                        <div class="product">
                            <div class="product-img">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('electro/img/product01.png') }}" alt="{{ $product->name }}">
                                @endif
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category ? $product->category->name : 'Uncategorized' }}</p>
                                <h3 class="product-name">
                                    <a href="{{ route('client.product', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">${{ number_format($product->price, 2) }}</h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                        @empty
                            <p class="text-muted text-center">No products available.</p>
                        @endforelse
                    </div>
                    <div id="slick-nav-top" class="products-slick-nav"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /TOP SELLING -->
@endsection

@extends('layouts.client')

@section('title', 'Store - Electro')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @if(request('category'))
                            <li><a href="{{ route('client.store') }}">Store</a></li>
                            <li class="active">
                                {{ $categories->firstWhere('id', request('category'))?->name ?? 'Category' }}
                            </li>
                        @else
                            <li class="active">Store</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">

                    <!-- Categories -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            @foreach($categories as $cat)
                            <div class="input-checkbox">
                                <input type="checkbox" id="cat-{{ $cat->id }}"
                                    {{ request('category') == $cat->id ? 'checked' : '' }}
                                    onchange="location.href='{{ route('client.store') }}?category={{ $cat->id }}{{ request('sort') ? '&sort=' . request('sort') : '' }}{{ request('search') ? '&search=' . request('search') : '' }}'">
                                <label for="cat-{{ $cat->id }}">
                                    <span></span>
                                    {{ $cat->name }}
                                </label>
                            </div>
                            @endforeach
                            @if(request('category'))
                            <div style="margin-top:8px">
                                <a href="{{ route('client.store', array_merge(request()->except('category', 'page'))) }}"
                                   style="color:#F28123;font-size:13px">Clear filter</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- /Categories -->

                    <!-- Sort by price (sidebar) -->
                    <div class="aside">
                        <h3 class="aside-title">Sort by Price</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="radio" id="sort-asc" name="sort-price"
                                    {{ request('sort') === 'price_asc' ? 'checked' : '' }}
                                    onchange="location.href='{{ route('client.store', array_merge(request()->except('sort','page'), ['sort'=>'price_asc'])) }}'">
                                <label for="sort-asc"><span></span> Price: Low to High</label>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" id="sort-desc" name="sort-price"
                                    {{ request('sort') === 'price_desc' ? 'checked' : '' }}
                                    onchange="location.href='{{ route('client.store', array_merge(request()->except('sort','page'), ['sort'=>'price_desc'])) }}'">
                                <label for="sort-desc"><span></span> Price: High to Low</label>
                            </div>
                        </div>
                    </div>
                    <!-- /Sort by price -->

                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <form method="GET" action="{{ route('client.store') }}" class="pull-left" style="display:flex;gap:8px;align-items:center;">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif
                            <input name="search" class="input" type="text" placeholder="Search products..."
                                   value="{{ request('search') }}" style="padding:6px 10px;border:1px solid #ccc;border-radius:3px;">
                            <button type="submit" class="primary-btn" style="padding:6px 16px;">Search</button>
                            @if(request()->hasAny(['search','category','sort']))
                                <a href="{{ route('client.store') }}" class="btn btn-sm btn-default">Clear all</a>
                            @endif
                        </form>
                        <div class="pull-right" style="line-height:36px;font-size:13px;color:#666">
                            Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}
                            of <strong>{{ $products->total() }}</strong> products
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- PRODUCTS -->
                    <div class="row">
                        @forelse($products as $product)
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('electro/img/product01.png') }}" alt="{{ $product->name }}">
                                    @endif
                                    @if($product->stock == 0)
                                    <div class="product-label"><span class="sale">Out of Stock</span></div>
                                    @elseif($product->stock <= 5)
                                    <div class="product-label"><span class="new">Low Stock</span></div>
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
                                    <button class="add-to-cart-btn" {{ $product->stock == 0 ? 'disabled' : '' }}>
                                        <i class="fa fa-shopping-cart"></i> add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <p class="text-center text-muted" style="padding:60px 0;">No products found.</p>
                        </div>
                        @endforelse
                    </div>
                    <!-- /PRODUCTS -->

                    <!-- PAGINATION -->
                    @if($products->hasPages())
                    <div class="store-filter clearfix">
                        <div class="store-pagination">
                            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    @endif
                    <!-- /PAGINATION -->

                </div>
                <!-- /STORE -->
            </div>
        </div>
    </div>
    <!-- /SECTION -->
@endsection

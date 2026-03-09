@extends('layouts.admin')
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-box"></i> Product List</h3>
        <div class="card-tools">
            <a href="{{ route('add') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus-circle"></i> Add New Product
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th style="width:50px">#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th style="width:160px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                     width="60" height="60" style="object-fit:cover;border-radius:4px;">
                            @else
                                <span class="text-muted"><i class="fas fa-image"></i> No image</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category ? $product->category->name : '—' }}</td>
                        <td>{{ number_format($product->price, 2) }} đ</td>
                        <td>
                            @if ($product->stock > 0)
                                <span class="badge badge-success">{{ number_format($product->stock) }}</span>
                            @else
                                <span class="badge badge-danger">Out of stock</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('edit', $product->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('delete', $product->id) }}" class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this product?')">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">No products found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

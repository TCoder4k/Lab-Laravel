@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit"></i> Edit Product
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="fas fa-tag"></i> Product Name <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name"
                               value="{{ old('name', $product->name) }}"
                               placeholder="Enter product name" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">
                            <i class="fas fa-dollar-sign"></i> Price <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               class="form-control @error('price') is-invalid @enderror"
                               id="price" name="price"
                               value="{{ old('price', $product->price) }}"
                               step="0.01" min="0"
                               placeholder="Enter price" required>
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">
                            <i class="fas fa-boxes"></i> Stock Quantity <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               class="form-control @error('stock') is-invalid @enderror"
                               id="stock" name="stock"
                               value="{{ old('stock', $product->stock) }}"
                               min="0"
                               placeholder="Enter stock quantity" required>
                        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">
                            <i class="fas fa-folder-open"></i> Category
                        </label>
                        <select class="form-control @error('category_id') is-invalid @enderror"
                                id="category_id" name="category_id">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">
                            <i class="fas fa-image"></i> Product Image
                        </label>
                        @if ($product->image)
                            <div class="mb-2">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                     style="max-height: 120px; border-radius: 4px;" id="currentImage">
                            </div>
                        @endif
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image"
                               accept="image/*">
                        <small class="text-muted">Leave blank to keep current image.</small>
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div id="imagePreview" class="mt-2"></div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update Product
                        </button>
                        <a href="{{ route('index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.getElementById('imagePreview');
        preview.innerHTML = '';
        if (this.files && this.files[0]) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(this.files[0]);
            img.style.maxHeight = '150px';
            img.style.borderRadius = '4px';
            preview.appendChild(img);
        }
    });
</script>
@endpush


        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            color: #333;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .btn-primary {
            background: #007bff;
            color: #fff;
            flex: 1;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
            flex: 1;
        }

        .btn-secondary:hover {
            background: #545b62;
        }

        .required {
            color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Edit Product</h1>
    </div>

    <form action="/product/update/{{ $product->id }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Product Name <span class="required">*</span></label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price (đ) <span class="required">*</span></label>
            <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock <span class="required">*</span></label>
            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="/product" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>

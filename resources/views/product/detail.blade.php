<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header {
            margin-bottom: 25px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .product-info {
            margin-bottom: 30px;
        }

        .info-row {
            display: flex;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .label {
            width: 180px;
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #333;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            color: #fff;
            transition: 0.3s;
        }

        .btn-back {
            background: #6c757d;
        }

        .btn-back:hover {
            background: #5a6268;
        }

        .btn-edit {
            background: #ffc107;
            color: #000;
        }

        .btn-edit:hover {
            background: #e0a800;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Product Detail</h1>
    </div>

    <div class="product-info">
        <div class="info-row">
            <div class="label">Product ID</div>
            <div class="value">{{ $id }}</div>
        </div>

        {{-- <div class="info-row">
            <div class="label">Product Name</div>
            <div class="value">{{ $product['name'] }}</div>
        </div>

        <div class="info-row">
            <div class="label">Price</div>
            <div class="value price">{{ number_format($product['price']) }} đ</div>
        </div> --}}
    </div>

    <div class="actions">
        <a href="{{ route('index') }}" class="btn btn-back">← Back to List</a>
        <a href="/product/edit/{{ $id }}" class="btn btn-edit">✏ Edit</a>
    </div>
</div>

</body>
</html>

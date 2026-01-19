<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>

    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 80px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title h1 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }

        .product-info {
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dashed #ddd;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #007bff;
        }

        .actions {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 22px;
            margin: 0 8px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-back {
            background: #6c757d;
            color: #fff;
        }

        .btn-back:hover {
            background: #5a6268;
        }

        .btn-edit {
            background: #28a745;
            color: #fff;
        }

        .btn-edit:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <h1>Product Detail</h1>
    </div>

    <div class="product-info">
        <div class="info-row">
            <span class="label">Product ID</span>
            <span class="value">{{ $id }}</span>
        </div>

        {{-- Bạn có thể mở rộng thêm --}}
        {{-- 
        <div class="info-row">
            <span class="label">Name</span>
            <span class="value">{{ $product->name }}</span>
        </div>
        --}}
    </div>

    <div class="actions">
        <a href="{{ url()->previous() }}" class="btn btn-back">← Back</a>
        <a href="#" class="btn btn-edit">✏ Edit</a>
    </div>
</div>

</body>
</html>

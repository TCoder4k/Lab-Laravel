<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            color: #fff;
            transition: 0.3s;
        }

        .btn-add {
            background: #28a745;
        }

        .btn-add:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table thead {
            background: #343a40;
            color: #fff;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:hover {
            background: #f1f1f1;
        }

        .action-buttons a {
            margin-right: 5px;
        }

        .btn-edit {
            background: #ffc107;
            color: #000;
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-delete {
            background: #dc3545;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .price {
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Product List</h1>
        <a href="/product/create" class="btn btn-add">+ Add Product</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product name</th>
                <th>Price</th>
                <th width="160">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td class="price">{{ number_format($product['price']) }} đ</td>
                    <td class="action-buttons">
                        <a href="/product/edit/{{ $product['id'] }}" class="btn btn-edit">Edit</a>
                        <a href="/product/delete/{{ $product['id'] }}"
                           class="btn btn-delete"
                           onclick="return confirm('Are you sure you want to delete this product?')">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

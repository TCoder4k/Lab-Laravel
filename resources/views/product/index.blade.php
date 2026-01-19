<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 700px;
            margin: 60px auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .add-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Product List</h1>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price ($)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Milks</td>
                <td>10.00</td>
            </tr>
             <tr>
                <td>Snacks</td>
                <td>20.00</td>
            </tr>
             <tr>
                <td>Popcorn</td>
                <td>30.00</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('add') }}" class="add-btn">➕ Add New Product</a>
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Product Test</title>
</head>
<body>
    <h1>Products: {{ $products->count() }}</h1>
    <ul>
    @foreach($products as $product)
        <li>{{ $product->id }} - {{ $product->name }} - ${{ $product->price }}</li>
    @endforeach
    </ul>
</body>
</html>

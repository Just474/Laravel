<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action={{ route('products.update',$product->id)  }}>
    @csrf
    @method('PATCH')
    <input name="product_name" type="text" value={{ $product->name }} >
    <input type="hidden" value={{ $product->id }}>
    <select name="category_id">
        @foreach($categories as $category)
            <option value={{ $category->id }} {{ $product->category_id === $category->id ? 'selected' : "" }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <input type="submit">
</form>
</body>
</html>

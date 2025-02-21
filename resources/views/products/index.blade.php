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
<header>
    @if(Route::has('login.login'))
        @auth
            <a href={{ route('login.logout') }}>Выйти</a>
        @else
            <a href={{ route('login.login') }}>Войти</a>
            @if(Route::has('login.register'))
                <a href={{ route('login.register') }}>Зарегистрироваться</a>
            @endif
        @endauth
    @endif
</header>
<section>
    <form method="get" action={{ route('products.index') }}>
        @csrf
        <select name="category_id">
            <option value="all">Все категории</option>
            @foreach($categories as $category)
                <option
                    value={{ $category->id }}
                    {{ isset($_GET['category_id']) ? ($category->id == $_GET['category_id'] ? 'Selected' : "") : "" }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Отфильтровать">
    </form>

    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>category</td>
            <td><a href={{ route('products.create') }}>Добавить</a></td>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name}}</td>
                <td>
                    <form method="post" action={{route('products.destroy',$product->id)}}>
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Удалить">
                    </form>
                </td>
                <td><a href="{{ route('products.edit', ['id' => $product->id]) }}">Изменить</a></td>
            </tr>
        @endforeach
    </table>
</section>
</body>
</html>

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
<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td><a href={{ route('categories.create') }}>Добавить</a></td>
    </tr>
    @foreach($categories as $category)
        <tr>

            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <form method="post" action={{ route('categories.destroy' , $category->id) }}>
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Удалить">
                </form></td>
            <td><a href={{ route('categories.edit', $category->id) }}>Изменить</a></td>
        </tr>
    @endforeach
</table>
</body>
</html>

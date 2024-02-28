<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="display: flex; justify-content: center">Post Index</h1>
    <div class="flex justify-center">
        <table class="table">
            <tr style="text-align: center">
                <th>Title</th>
                <th>Slug</th>
                <th>Content</th>
                <th>Image</th>
                <th>Posted</th>
                <th>Category</th>
                <th>Description</th>
                <th>Acciones</th>
            </tr>
            @foreach ($dataPost as $data)
            <tr style="text-align: center">
                <td><input disabled type="text" value="{{$data->title}}"></td>
                <td><input disabled type="text" value="{{$data->slug}}"></td>
                <td><input disabled type="text" value="{{$data->content}}"></td>
                <td><input disabled type="text" value="{{$data->image}}"></td>
                <td><input disabled type="text" value="{{$data->posted}}"></td>
                <td><input disabled type="text" value="{{$data->categories_id}}"></td>
                <td><input disabled type="text" value="{{$data->description}}"></td>
                <td>
                    <a class="btnEdit" href="{{ route('post.edit', $data->id) }}">Editar</a>
                    <a class="btnShow" href="{{ route('post.show', $data->id) }}">Mostrar</a>
                    <form action="{{ route('post.destroy', $data->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btnDelete" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
<br>
</html>
{{$dataPost->links()}}
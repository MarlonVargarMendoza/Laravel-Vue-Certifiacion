@extends('layouts.home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="display: flex; justify-content: center">Crear Post</h1>

    <form action="{{ route('post.store') }}" method="post">
    @csrf
        <table style="width: 100%">
            <tr>
                <th>Content</th>
                <th>Image</th>
                <th>Posted</th>
                <th>Category</th>
            </tr>
            <tr style="text-align: center;">
                <td><input name="Content" type="text"></td>
                <td><input name="Image" type="text"></td>
                <td><select name="Posted">
                        <option disabled selected>Select An Option...</option>
                        <option value="yes">YES</option>
                        <option value="not">NOT</option>
                    </select></td>
                <td>
                    <select name="Category">
                        <option disabled selected>Select An Option...</option>
                        @foreach ($categories as $id => $title)
                            <option value={{$id}} >{{$title}} </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Description</th>
            </tr>
            <br>
            <tr style="text-align: center;">
                <td><input name="Title" Title="text"></td>
                <td><input name="Slug" type="text"></td>
                <td><input name="Description" type="text"></td>

            </tr>
        </table>
        <br>
        <div style="display: flex; justify-content: center">
            <button type="submit">Enviar</button>
        </div>
    </form>

</body>
</html>
@endsection
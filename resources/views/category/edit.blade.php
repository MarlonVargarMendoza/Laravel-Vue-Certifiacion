@extends('layouts.home')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
        <h1 style="display: flex; justify-content: center">Edit Categories</h1>
        <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <table style="width: 100%">
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                </tr>
                <tr style="text-align: center">
                    <td><input type="text" name="title" value="{{$category->title}}"></td>
                    <td><input type="text" name="slug" value="{{$category->slug}}"></td>
                </tr>
            </table>
            <div style="display: flex; justify-content: center">
                <button type="submit">Editar Categoria</button>
            </div>
        </form>
    @endsection
</body>
</html>
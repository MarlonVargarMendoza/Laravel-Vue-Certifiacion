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
    
    <section id="create">
    
        @if (session('Mensaje'))
            {{session('Mensaje')}}
        @endif

        @include('errors.errorsCreate')  

        <h1 style="display: flex; justify-content: center" >Created Categories</h1>

        <form action=" {{ route('category.store') }} " method="post">
            @csrf
            <div class="flex justify-center">
            <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                    </tr>
                    <tr style="text-align: center">
                        <td><input type="text" name="title"></td>
                        <td><input type="text" name="slug"></td>
                    </tr>
            </table>
            </div>
            <div style="display: flex; justify-content: center">
                <button class="btnCreate" type="submit">Crear Categoria</button>
            </div>
        </form>

    </section>
    <br>
    <section id="index">
        @include('category.index')
    </section>

@endsection
</body>
</html>

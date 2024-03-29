@extends('layouts.home')
@section('content')
    <h1 style="display: flex; justify-content: center">Edit Categories</h1>
    <form action="{{ route('category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="flex justify-center" >
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                </tr>
                <tr style="text-align: center">
                    <td><input type="text" name="title" value="{{$category->title}}"></td>
                    <td><input type="text" name="slug" value="{{$category->slug}}"></td>
                </tr>
            </table>
        </div>
        <div style="display: flex; justify-content: center">
            <button class="btnEdit" type="submit">Editar Categoria</button>
        </div>
    </form>
@endsection
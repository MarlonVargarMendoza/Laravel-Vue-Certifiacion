@extends('layouts.home')

@section('content')
    @include('errors.errorsCreate')

    @if (session('Mensaje'))
        {{session('Mensaje')}}
    @endif

    <section id="create">
        <h2 class="flex justify-center">Post Create</h2>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="flex justify-center">
                <table  class="table" >
                    <tr>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Posted</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                    </tr>
                    <tr >
                        <td><input name="content" type="text"></td>
                        <td><input name="image" type="text"></td>
                        <td><select name="posted">
                                <option disabled selected>Select An Option...</option>
                                <option value="yes">YES</option>
                                <option value="not">NOT</option>
                            </select></td>
                        <td>
                            <select name="categories_id">
                                <option disabled selected>Select An Option...</option>
                                @foreach ($categories as $id => $title)
                                    <option value={{$id}} >{{$title}} </option>
                                @endforeach
                            </select>
                        </td>
                        <td><input name="title" Title="text"></td>
                        <td><input name="slug" type="text"></td>
                        <td><input name="description" type="text"></td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-center">
                <button class="btnCreate" type="submit">Crear Registro</button>
            </div>
            <br>
        </form>
    </section>
    <br>
    <section id="index">
        @include('dashboard.index')
    </section>
@endsection
@extends('layouts.home')

@section('content')
    @php
        $data = $regisPost->toArray();
    @endphp
    <section id="edit">
        @include('errors.errorsCreate')
        <h2 style="display: flex; justify-content: center">Route Edit</h2>
        <form action="{{ route('post.update', $data['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT");
            <div class="flex justify-center">
                <table class="table">
                    <tr>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Posted</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                    </tr>
                    <tr style="text-align: center;">
                        <td><input name="content" type="text" value="{{$data['content']}}"></td>
                        <td><input name="image" type="file"></td>
                        <td><select name="posted">
                                <option disabled selected>Select An Option...</option>
                                <option value="yes" {{ $data['posted'] == 'yes' ? 'selected' : ''}}>YES</option>
                                <option  value="not" {{ $data['posted'] == 'not' ? 'selected' : ''}}>NOT</option>
                            </select></td>
                        <td>
                            <select name="categories_id">
                                <option disabled selected>Select An Option...</option>
                                @foreach ($categories as $id => $title)
                                    <option {{ $data['categories_id'] == $id ? 'selected' : ''}}
                                        value={{$id}} >{{$title}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td><input name="title" Title="text" value="{{$data['title']}}"></td>
                        <td><input name="slug" type="text" value="{{$data['slug']}}"></td>
                        <td><input name="description" type="text" value="{{$data['description']}}"></td>
                    </tr>
                </table>
            </div>
            <div style="display: flex; justify-content: center">
                <button class="btnEdit" type="submit">Editar Registro</button>
            </div>
        </form>
    </section>
@endsection
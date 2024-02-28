<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="display: flex; justify-content: center" >Index Categories</h1>
    <table style="width: 100%">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $c)
            <tr style="text-align: center;">
                <td><input disabled type="text" value="{{$c->title}}"></td>
                <td><input disabled type="text" value="{{$c->slug}}"></td>
                <td>
                    <a href="{{ route('category.show', $c->id) }}">Show</a>
                    <a href="{{ route('category.edit', $c->id) }}">Edit</a>
                    <form action="{{ route('category.destroy', $c->id) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit">Destroy</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
</body>
</html>
{{$categories->links()}}
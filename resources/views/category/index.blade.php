<h1 style="display: flex; justify-content: center" >Index Categories</h1>
    <div class="flex justify-center">
        <table class="table">
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
                        <a class="btnShow" href="{{ route('category.show', $c->id) }}">Show</a>
                        <a class="btnEdit" href="{{ route('category.edit', $c->id) }}">Edit</a>
                        <form action="{{ route('category.destroy', $c->id) }}" method="post" >
                            @csrf
                            @method('DELETE')
                            <button class="btnDelete" type="submit">Destroy</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
{{$categories->links()}}
@if ($errors->any())
    @foreach ($errors->all() as $e)
        {{$e}}
        <br>
    @endforeach
@endif
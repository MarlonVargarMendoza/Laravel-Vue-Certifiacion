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

    @foreach ($data as $item)
        <h1>{{$item}}</h1>
    @endforeach

    <h1>{{$nacionalidad}}</h1>
    </p>
    
    <a href="{{ route('redireccion') }}">Login</a>
</body>
</html>
@endsection

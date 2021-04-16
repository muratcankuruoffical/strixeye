<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('message'))
    <div>
        <p>{{ session('message') }}</p>
    </div>
@endif
<form action="{{ route('pokemons.store') }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <input type="file" name="picture"><br>
    <input type="text" name="name" placeholder="Your pokemon name"><br>
    <input type="number" name="age" placeholder="Your pokemon age"><br>
    <input type="number" name="height" placeholder="Your pokemon height"><br>
    <input type="text" name="evolves_from" placeholder="Your pokemon evolves from"><br>
    <input type="text" name="evolves_to" placeholder="Your pokemon evolves to"><br>
    <input type="text" name="weakness" placeholder="Your pokemon weakness"><br>
    <input type="text" name="ability" placeholder="Your pokemon ability"><br>
    <input type="submit" value="Create Pokemon">
</form>
</body>
</html>

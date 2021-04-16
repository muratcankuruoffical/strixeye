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
<form action="{{ route('pokemons.update', $pokemon) }}" method="POST">
    @method("PUT")
    @csrf
    <input type="file" name="picture"><br>
    <input type="hidden" name="picture" value="{{ $pokemon->picture }}">
    <input type="text" name="name" placeholder="Your pokemon name" value="{{ $pokemon->name }}"><br>
    <input type="number" name="age" placeholder="Your pokemon age" value="{{ $pokemon->age }}"><br>
    <input type="number" name="height" placeholder="Your pokemon height" value="{{ $pokemon->height }}"><br>
    <input type="text" name="evolves_from" placeholder="Your pokemon evolves from" value="{{ $pokemon->evolves_from }}"><br>
    <input type="text" name="evolves_to" placeholder="Your pokemon evolves to" value="{{ $pokemon->evolves_to }}"><br>
    <input type="text" name="weakness" placeholder="Your pokemon weakness" value="{{ $pokemon->weakness }}"><br>
    <input type="text" name="ability" placeholder="Your pokemon ability" value="{{ $pokemon->ability }}"><br>
    <input type="submit" value="Create Pokemon">

</form>
</body>
</html>

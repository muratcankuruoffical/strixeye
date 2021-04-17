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
{{ $possessor->name }}
<h2>Your Pokemons</h2>
@if($possessor->pokemons)
    @foreach($possessor->pokemons as $pokemon)
        <img src="{{ asset('pictures/'.$pokemon->picture) }}" alt="">
        {{ $pokemon->name }}
    @endforeach
@endif

</body>
</html>

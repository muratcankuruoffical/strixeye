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
<table>
    <thead>
    <th>#</th>
    <th>Name</th>
    <th>Picture</th>
    <th>Age</th>
    <th>Height</th>
    <th>Evolves From</th>
    <th>Evolves To</th>
    <th>Weakness</th>
    <th>Ability</th>
    <th>Actions</th>
    </thead>
    <tbody>

    @foreach($pokemons as $pokemon)
        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $pokemon->name }}</td>
            <td>{{ $pokemon->picture }}</td>
            <td>{{ $pokemon->age }}</td>
            <td>{{ $pokemon->height }}</td>
            <td>{{ $pokemon->evolves_from }}</td>
            <td>{{ $pokemon->evolves_to }}</td>
            <td>{{ $pokemon->weakness }}</td>
            <td>{{ $pokemon->ability }}</td>
            <td><a href="{{ route('pokemons.edit', ['pokemon' => $pokemon->id]) }}">Edit</a></td>
            <td>
                <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

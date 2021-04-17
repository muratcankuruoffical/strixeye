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
    <th>Score</th>
    <th>Actions</th>
    </thead>
    <tbody>

    @foreach($possessors as $possessor)
        <tr>
            <td>{{ $loop->index }}</td>
            <td><a href="{{ route('possessors.show', $possessor->id) }}">{{ $possessor->name }}</a></td>
            <td>{{ $possessor->picture }}</td>
            <td>{{ $possessor->age }}</td>
            <td>{{ $possessor->score }}</td>
            <td>
                <a href="{{ route('possessors.edit', $possessor) }}">Edit</a>
                <form action="{{ route('possessors.destroy', $possessor->id) }}" method="POST">
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

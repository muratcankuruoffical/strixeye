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
<form action="{{ route('possessors.store') }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <input type="file" name="picture"><br>
    <input type="text" name="name" placeholder="Your possessor name"><br>
    <input type="number" name="age" placeholder="Your possessor age"><br>
    <input type="number" name="score" placeholder="Your possessor score"><br>
    <input type="submit" value="Create Possessor">
</form>
</body>
</html>

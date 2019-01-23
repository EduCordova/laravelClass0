<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>{{$title}}</h1>
    <p>View in construction </p>

    <hr>
    @empty($users)
    <p>No Hay Usuarios Registrados</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>{{$user}}</li>
            @endforeach
        </ul>
    @endempty

</body>
</html>
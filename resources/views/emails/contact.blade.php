<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hola Cristian, has recibido un correo electrónico procedente de tu portafolio</h1>
    <p>Name: <strong>{{ $textMessage['name'] }}</strong> </p>
    <p>Email: <strong>{{ $textMessage['email'] }}</strong> </p>
    <p>Message: <strong>{{ $textMessage['message'] }}</strong> </p>
    {{-- <p>Name: <strong>{{$textMessage['name']}}</strong> </p> --}}
</body>

</html>

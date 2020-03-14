<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($data as $value)
    <p class="card-panel red lighten-1">{{ $value->nom }}</p>
    <p class="card-panel red lighten-1">{{ $value->prenom }}</p>
    <p class="card-panel red lighten-1">{{ $value->age }}</p>
    <p class="card-panel red lighten-1">{{ $value->estGros }}</p>
  @endforeach

</body>
</html>


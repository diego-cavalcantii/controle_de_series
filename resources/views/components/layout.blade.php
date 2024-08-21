<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}} - Controle de Séries</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
</head>
<body>
  <header>
    <h1>{{$title}}</h1>
  </header>
  <main class="container-series">
    {{$slot}}
  </main>
</body>
</html>
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
    <nav>
    <h1>{{$title}}</h1>
      <ul>
        <li><a href="{{url('/')}}">Todos</a></li>
        <li><a href="{{url('series/acao')}}">Ação</a></li>
        <li><a href="{{url('series/comedia')}}">Comedia</a></li>
        <li><a href="{{url('series/drama')}}">Drama</a></li>
        <li><a href="{{url('series/terror')}}">Terror</a></li>
      </ul>
    </nav>
  </header>
  <main class="container-series">
    {{$slot}}
  </main>
</body>
</html>
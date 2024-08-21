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
        <li><a href="{{ url('/') }}">Todas</a></li>
        <li><a href="{{ url('/series/acao') }}">Ação</a></li>
        <li><a href="{{ url('/series/comedia') }}">Comédia</a></li>
        <li><a href="{{ url('/series/drama') }}">Drama</a></li>
        <li><a href="{{ url('/series/suspense') }}">Suspense</a></li>
        <li><a href="{{ url('/series/terror') }}">Terror</a></li>
      </ul>
    </nav>
  </header>
  <main class="container-series">
    {{$slot}}
  </main>
  <footer>
    <p>Diego Silva Cavalcanti&copy;</p>
    <a href="https://github.com/diego-cavalcantii"><img src="https://cdn-icons-png.flaticon.com/512/1051/1051377.png" alt="icone github"></a>
    <a href="https://www.linkedin.com/in/diego-silva-cavalcanti-a8b2b91a4"><img src="https://cdn-icons-png.flaticon.com/256/174/174857.png" alt="icone linkedin"></a>
  </footer>
</body>


</html>
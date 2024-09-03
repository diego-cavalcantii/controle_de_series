<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}} - Controle de Séries</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <x-header title="{{$title}}" />

  <main class="container-series">
      @isset($mensagemSucesso)
          <div class="alert alert-success mt-4">
              {{ $mensagemSucesso }}
          </div>
      @endisset

      @if($errors->any())
          <div class="alert alert-danger" style="display:flex; gap:20px; align-items:center; width:fit-content;">
              <img src="https://cdn-icons-png.flaticon.com/512/1980/1980005.png" alt="imagem de erro" style="width:50px; height:50px;">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style="list-style:none;">{{$error}}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    {{$slot}}
  </main>
  <footer>
    <p>Diego Silva Cavalcanti&copy;</p>
    <a href="https://github.com/diego-cavalcantii"><img src="https://cdn-icons-png.flaticon.com/512/1051/1051377.png" alt="icone github"></a>
    <a href="https://www.linkedin.com/in/diego-silva-cavalcanti-a8b2b91a4"><img src="https://cdn-icons-png.flaticon.com/256/174/174857.png" alt="icone linkedin"></a>
  </footer>
  <script src="{{ asset('js/header.js') }}"></script>
</body>

</html>

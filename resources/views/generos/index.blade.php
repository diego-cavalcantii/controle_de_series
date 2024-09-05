<x-layout title="Gêneros" >
  <ul class="list-group" style="margin-bottom: 20px;">
    @foreach($generos as $genero)
    <li class="list-group-item">{{ $genero->nome_genero }}
      <form action="{{ route('generos.destroy', $genero->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Apagar</button>
        <a class="btn btn-warning" href="{{ route('generos.edit', $genero->id) }}">Editar</a>
    </form>
    </li>
    @endforeach
  </ul>
  <a class="Btn success" href="{{ route('series.create') }}">
    <div class="sign">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
      </svg>
    </div>
    <div class="text">Voltar</div>
  </a>
</x-layout>

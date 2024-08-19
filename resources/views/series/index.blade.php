<x-layout title="Séries">
  <a class="btn btn-dark mb-3" href="{{ url('/series/criar') }}">Adicionar nova Série</a>
    <ul class="movie-list">
    @foreach($series as $serie)
    <div class="movie-box">
      <li>
        {{ $serie->nome }} - {{ $serie->genero }}
      </li>
      <div style="display:flex; gap:5px;">
        <a href="{{ url('/series/'.$serie->id.'/editar') }}" class="btn btn-warning">Editar</a>
        <form action="{{ url('/series/'.$serie->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
        @endforeach
      </ul>
    </div>
</x-layout>

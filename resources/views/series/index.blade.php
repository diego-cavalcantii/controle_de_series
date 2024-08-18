<x-layout title="Séries">
  <a class="btn btn-dark mb-2" href="{{ url('/series/criar') }}">Adicionar nova Série</a>
  <ul class="list-group">
    <div style="display:flex; flex-direction:column;">
      @foreach($series as $serie)
      <div class="display:flex; width:100%; justify-content:space-between;">
        <li class="list-group-item" style="width:auto;">
          {{ $serie->nome }} - {{ $serie->genero }}
        </li>
        <div style="display:flex; gap:5px;">
          <!-- Botão de Edição -->
          <a href="{{ url('/series/'.$serie->id.'/editar') }}" class="btn btn-warning">Editar</a>

          <!-- Botão de Exclusão -->
          <form action="{{ url('/series/'.$serie->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
  </ul>
</x-layout>

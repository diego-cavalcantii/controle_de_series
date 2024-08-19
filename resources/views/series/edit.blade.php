<x-layout title="Editar Série">
  <form action="{{ url('/series/'.$serie->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Define o método como PUT para atualizar -->

    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ $serie->nome }}" required>
    </div>
    <div class="form-group">
      <label for="genero">Gênero</label>
      <input type="text" class="form-control" id="genero" name="genero" value="{{ $serie->genero }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
  </form>
</x-layout>

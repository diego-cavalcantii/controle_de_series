<x-layout title="Adicionar um Gênero">
  <div class="container">
    <form action="{{ url('/series/salvar-genero') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="genero" class="form-label">Gênero</label>
        <input type="text" class="form-control" id="genero" name="genero" required>
      </div>
      <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
  </div>
</x-layout>
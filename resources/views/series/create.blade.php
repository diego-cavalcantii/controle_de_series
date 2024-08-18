<x-layout title="Nova Série">
  <form action="/series/salvar" method="post">
    @csrf
    <div class="mb-3">      
      <label for="nome" class="form-label mt-2">Nome:</label>
      <input type="text" name="nome" id="nome" class="form-control">
      <label for="genero" class="form-label mt-2">Genero:</label>
      <input type="text" name="genero" id="genero" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-2"> Adicionar</button>
  </form>
</x-layout>

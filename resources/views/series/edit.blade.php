<x-layout title="Editar Série">
  <form action="{{ url('/series/'.$serie->id) }}" method="POST" style="display:flex; flex-direction:column; gap:10px;">
    @csrf
    @method('PUT') <!-- Define o método como PUT para atualizar -->

    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ $serie->nome }}" required>
    </div>
    <div class="form-group">
      <label for="genero">Gênero</label>
      <select name="genero" id="genero" class="form-control">
        <option value="" default>{{ucwords($serie->genero)}}</option>
        <option value="Ação">Ação</option>
        <option value="Drama">Drama</option>
        <option value="Terror">Terror</option>
        <option value="Suspense">Suspense</option>
        <option value="Comédia">Comédia</option>
      </select>
    </div>
    <div class="form-group">
      <label for="poster">Link do Poster</label>
      <input type="text" class="form-control" id="poster" name="poster" value="{{ $serie->poster }}" required>
    </div>
    <div class="box-button">
      <button class="Btn" type="submit">

        <div class="sign"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 96l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-245.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3L448 416c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96C0 60.7 28.7 32 64 32l245.5 0c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8L320 184c0 13.3-10.7 24-24 24l-192 0c-13.3 0-24-10.7-24-24L80 80 64 80c-8.8 0-16 7.2-16 16zm80-16l0 80 144 0 0-80L128 80zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/></svg></div>

        <div class="text">Salvar</div>
      </button>
    </div>
  </form>
  <a href="{{url('/')}}">
  <button class="Btn success">
    <div class="sign"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></div>
    <div class="text">Voltar</div>
  </button>
  </a>
</x-layout>

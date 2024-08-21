<x-layout title="Nova Série">
  <form action="/series/salvar" method="POST">
    @csrf
    <div class="mb-3">      
      <label for="nome" class="form-label mt-2">Nome:</label>
      <input type="text" name="nome" id="nome" class="form-control">
      <label for="genero" class="form-label mt-2">Genero:</label>
      <input type="text" name="genero" id="genero" class="form-control">
      <label for="poster" class="form-label mt-2">Link do Poster:</label>
      <input type="text" name="poster" id="poster" class="form-control">
    </div>
    <div class="box-button">
      <button class="Btn" type="submit">
        <div class="sign"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></div>
          
        <div class="text">Adicionar</div>
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

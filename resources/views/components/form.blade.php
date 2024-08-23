<!-- resources/views/components/form.blade.php -->
<form action="{{ $action }}" method="POST" class="container-form">
    @csrf
    @if($isEdit)
    @method('PUT')
    @endif

    @if($errors->any())
    <div class="alert alert-danger" style="display:flex; gap:20px; align-items:center; width:fit-content;">
        <img src="https://cdn-icons-png.flaticon.com/512/1980/1980005.png" alt="imagem de alter" style="width:50px; height:50px;">
        <ul>
            @foreach ($errors->all() as $error)
            <li style="list-style:none;">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form">
        <div class="input">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $serie->nome ?? '' }}" required>
        </div>

        <div class="input">
            <label for="genero">Gênero:</label>
            <select name="genero" id="genero" required>
                <option value="" default>{{ $serie->genero ?? 'Selecione o gênero' }}</option>
                @foreach($generos as $genero)
                <option value="{{ $genero->nome_genero }}">{{ $genero->nome_genero }}</option>
                @endforeach
            </select>
            <a href="{{ url('/series/add-genero') }}">Adicionar um gênero</a>
        </div>

        <div class="input">
            <label for="poster">Link do Poster:</label>
            <input style="color:blue; font-style:italic; text-decoration: underline" type="text" name="poster" id="poster" value="{{ $serie->poster ?? '' }}" required>
        </div>

        <div class="box-button">
            <a class="Btn success" href="{{ url('/') }}">
                <div class="sign">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                    </svg>
                </div>
                <div class="text">Voltar</div>
            </a>
            <button class="Btn" type="submit">
                <div class="sign">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </div>
                <div class="text">{{ $isEdit ? 'Salvar' : 'Adicionar' }}</div>
            </button>
        </div>
    </div>
</form>
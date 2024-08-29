<!-- resources/views/components/form.blade.php -->
<form action="{{ $action }}" method="POST" class="container-form">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="form">
        <div class="input">
            <label for="nome">Nome:</label>
            <input autofocus type="text" name="nome" id="nome" value="{{ $serie->nome ?? '' }}" >
        </div>

        <div class="input">
            <label for="genero_id">Gênero:</label>
            <select name="genero_id" id="genero_id">
                <option value="" disabled {{ !isset($serie) ? 'selected' : '' }}>Selecione o gênero</option>
                @foreach($generos as $genero)
                    <option value="{{ $genero->id }}" {{ (isset($serie) && $serie->genero_id == $genero->id) ? 'selected' : '' }}>
                        {{ $genero->nome_genero }}
                    </option>
                @endforeach
            </select>

            <div class="edit-genero">
                <a class="btn btn-primary" href="{{ url('/generos/criar') }}">Adicionar um gênero</a>
                <a class="btn btn-primary" href="{{ url('/generos') }}">Apagar um gênero</a>
            </div>
        </div>

        <div class="input">
            <label for="poster">Link do Poster:</label>
            <input style="color:blue; font-style:italic; text-decoration: underline" type="text" name="poster" id="poster" value="{{ $serie->poster ?? '' }}" >
        </div>
        <div class="d-flex justify-content-between">
            <div class="input">
                <label for="seasonsQty">Nº de Temporadas</label>
                <input type="text" name="seasonsQty" id="seasonsQty" value="{{ $serie->seasonsQty ?? '' }}" >
            </div>
            <div class="input">
                <label for="episodesPerSeason">Episódios por Temporada</label>
                <input type="text" name="episodesPerSeason" id="episodesPerSeason" value="{{ $serie->episodesPerSeason ?? '' }}" >
            </div>
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

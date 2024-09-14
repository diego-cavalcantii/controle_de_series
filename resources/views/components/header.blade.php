<header>
    <nav>
        <h1>{{ $title }}</h1>
        <form id="filterForm" action="{{ route('series.filter') }}">
            <select name="genero" id="genero" class="brutalist-input ">
                <option value="" disabled selected>Selecione o Gênero</option>
                @foreach($generos as $genero)
                    <option value="{{$genero->id}}">{{ $genero->nome_genero }}</option>
                @endforeach
                <option style="background-color:crimson; color:#fff;" value="">Todos</option>
            </select>
            <select name="avaliacao" id="avaliacao" class="brutalist-input ">
                <option value="" disabled selected>Selecione a Avaliação</option>
                @foreach($avaliacoes as $avaliacao)
                    <option value="{{$avaliacao}}">{{ $avaliacao}}</option>
                @endforeach
                <option style="background-color:crimson; color:#fff;" value="">Todos</option>
            </select>
            <select name="assistido" id="assistido" class="brutalist-input ">
                <option value="" disabled selected>Selecione o Status</option>
                @foreach($assistidos as $assistido)
                    <option value="{{$assistido}}">{{ $assistido}}</option>
                @endforeach
                <option style="background-color:crimson; color:#fff;" value="">Todos</option>
            </select>
            <button type="submit" class="search">
                <svg viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"></path>
                </svg>
            </button>
        </form>

    </nav>
</header>


<x-layout title="{{$serie->nome . ' - Temporada ' .  $season->numero}}" :mensagem-sucesso="$mensagemSucesso">
    <form method="post">
        @csrf
        <ul class="movie-list">
            @foreach($episodes as $episode)
                <li class="movie-box">
                    <div class="box-info">
                            <h2 style="text-decoration: none">{{'Episódio '.  ucwords($episode->numero) }}</h2>
                            <input
                                    type="checkbox"
                                    name="episodes[]"
                                    value="{{ $episode->id }}"
                                    @if($episode->watched) checked @endif />
                        </span>
                    </div>
                </li>
            @endforeach
        <span class="save-episodes">
            <button class="Btn" type="submit">
                <div class="sign">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </div>
                <div class="text">Salvar</div>
            </button>
        </span>
        </ul>
    </form>
</x-layout>

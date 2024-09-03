<x-layout title="{{$serie->nome . ' - Temporada ' .  $season->numero}}" >
    <form method="post">
        @csrf
        <ul class="movie-list">
            @foreach($episodes as $episode)
                <li class="movie-box">
                    <div class="box-info">
                            <h2 style="text-decoration: none">{{'Episódio '.  ucwords($episode->numero) }}</h2>
                        <label class="check">
                            <input type="checkbox"
                                   name="episodes[]"
                                   value="{{ $episode->id }}"
                                   @if($episode->watched) checked @endif>
                            <div class="checkmark"></div>
                        </label>
                        </span>
                    </div>
                </li>
            @endforeach
                <div class="box-button">
                    <a class="Btn success" href="{{ route('seasons.index',$serie->id) }}">
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
                        <div class="text">Salvar</div>
                    </button>
                </div>
        </ul>
    </form>
</x-layout>

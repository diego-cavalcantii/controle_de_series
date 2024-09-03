<x-layout title="Temporadas de {{ucwords($serie->nome)}}">
    <ul class="movie-list">
        @foreach($seasons as $season)
            <li class="movie-box">
                <div class="box-info">
                    <a href="{{ route('episodes.index', $season->id) }}">
                        <h2>{{'Temporada '.  ucwords($season->numero) }}</h2>
                    </a>
                    <span class="badge bg-secondary">
                        {{ $season->numberOfWatchedEpisodes()}} / {{ $season->episodes->count() }}
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>

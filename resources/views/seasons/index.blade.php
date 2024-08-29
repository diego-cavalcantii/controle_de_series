<x-layout title="{{$serie->nome}}">
    <ul class="movie-list">
        @foreach($seasons as $season)
            <li class="movie-box">
                <div class="box-info">
                    <h2>{{'Temporada '.  ucwords($season->numero) }}</h2>
                    <span class="badge bg-secondary">
                        {{ $season->episodes->count() }}
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>

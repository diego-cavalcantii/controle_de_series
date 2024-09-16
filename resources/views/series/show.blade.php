<x-layout title="{{ $series->nome }}" class="main-show">
    <section class="container-serie-show">
        <article class="container-serie-show-info">
            <h2>{{ $series->nome }}</h2>
            <h3><strong>Gênero:</strong> {{ $series->generos->nome_genero }}</h3>
            <h4><strong>Avaliação:</strong></h4>
            <div class="rating">
                <input value="5 estrelas" name="avaliacao" id="star5" type="radio" {{ $series->avaliacao == "5 estrelas" ? 'checked' : '' }} disabled>
                <label title="5 estrelas" for="star5"></label>
                <input value="4 estrelas" name="avaliacao" id="star4" type="radio" {{ $series->avaliacao == "4 estrelas" ? 'checked' : '' }} disabled>
                <label title="4 estrelas" for="star4"></label>
                <input value="3 estrelas" name="avaliacao" id="star3" type="radio" {{ $series->avaliacao == "3 estrelas" ? 'checked' : '' }} disabled>
                <label title="3 estrelas" for="star3"></label>
                <input value="2 estrelas" name="avaliacao" id="star2" type="radio" {{ $series->avaliacao == "2 estrelas" ? 'checked' : '' }} disabled>
                <label title="2 estrelas" for="star2"></label>
                <input value="1 estrela" name="avaliacao" id="star1" type="radio" {{ $series->avaliacao == "1 estrela" ? 'checked' : '' }} disabled>
                <label title="1 estrela" for="star1"></label>
            </div>

        </article>
        <article class="box-img-show">
                <img class="poster-show" src="{{ $series->poster }}" alt="poster da serie {{ $series->nome }}">
        </article>


    </section>

</x-layout>

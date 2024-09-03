<x-layout title="Editar Série:  {{$serie->nome}} ">
  <x-formSerie
    :action="route('series.update', $serie->id)"
    :serie="$serie"
    :isEdit="true"
    :generos="$generos"
    :seasons="$seasons"
    :episodes="$episodes"
  />
</x-layout>

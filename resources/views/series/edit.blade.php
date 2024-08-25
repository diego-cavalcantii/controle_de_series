<x-layout title="Editar Série">
  <x-formSerie
    :action="route('series.update', $serie->id)"
    :serie="$serie"
    :isEdit="true"
    :generos="$generos" />
</x-layout>
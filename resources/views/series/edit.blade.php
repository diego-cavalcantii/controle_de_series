<x-layout title="Editar Série">
  <x-formSerie
    :action="url('/series/'.$serie->id)"
    :serie="$serie"
    :isEdit="true"
    :generos="$generos" />
</x-layout>
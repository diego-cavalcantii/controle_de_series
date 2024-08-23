<x-layout title="Editar Série">
  <x-form
    :action="url('/series/'.$serie->id)"
    :serie="$serie"
    :isEdit="true"
    :generos="$generos" />
</x-layout>
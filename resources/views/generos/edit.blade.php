<x-layout title="Editar Gênero">
  <x-formGenero
    :action="route('generos.update', $genero->id)"
    :isEdit="true"
    :genero="$genero" />
</x-layout>
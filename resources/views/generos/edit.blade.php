<x-layout title="Editar Gênero">
  <x-formGenero
    :action="url('/generos/'.$genero->id)"
    :isEdit="true"
    :genero="$genero" />
</x-layout>
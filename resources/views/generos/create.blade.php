<x-layout title="Adicionar Novo Gênero">
  <x-formGenero
    :action="route('generos.store')"
    :isEdit="false" />
</x-layout>
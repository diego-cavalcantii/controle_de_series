<x-layout title="Adicionar Novo Gênero">
  <x-formGenero
    :action="url('/generos/salvar')"
    :isEdit="false" />
</x-layout>
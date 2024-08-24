<x-layout title="Nova Série">
  <x-formSerie
    :action="url('/series/salvar')"
    :isEdit="false"
    :generos="$generos" />
</x-layout>
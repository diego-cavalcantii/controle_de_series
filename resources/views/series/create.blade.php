<x-layout title="Nova Série">
  <x-form
    :action="url('/series/salvar')"
    :isEdit="false"
    :generos="$generos" />
</x-layout>
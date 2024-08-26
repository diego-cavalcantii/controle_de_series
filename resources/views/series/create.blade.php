<x-layout title="Nova Série">
  <x-formSerie
    :action="route('series.store')"
    :isEdit="false"
    :generos="$generos"/>
</x-layout>

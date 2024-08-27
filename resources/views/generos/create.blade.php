<x-layout title="Adicionar Novo Gênero">
@isset($mensagemSucesso)
    <div class="alert alert-success mt-4">
        {{ $mensagemSucesso }}
    </div>
    @endisset
  <x-formGenero
    :action="route('generos.store')"
    :isEdit="false" />
</x-layout>

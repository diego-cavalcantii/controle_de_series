<x-layout title="Temporadas">
  <ul>
    @foreach($series as $serie)
      <li>{{$serie}}</li>
    @endforeach
  </ul>
  <x-oi></x-oi>
</x-layout>
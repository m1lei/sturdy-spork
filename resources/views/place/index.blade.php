@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Наши места</h1>

        {{-- Вызываем Livewire компонент --}}
        @livewire('index-place')
    </div>
@endsection

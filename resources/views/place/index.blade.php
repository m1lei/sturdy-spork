@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- Вызываем Livewire компонент --}}
        @livewire('index-place')
    </div>
@endsection

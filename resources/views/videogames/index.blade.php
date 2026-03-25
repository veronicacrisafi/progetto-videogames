@extends('layouts.videogames')
@section('titolo', 'Tutti i videogames')
@section('contenuto')
    <div class="row">
        @foreach ($videogames as $videogame)
            <div class="col-4 my-3">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title mb-5">{{ $videogame->titolo_videogame }}</h4>
                        <h5 class="card-subtitle mb-4 text-color-secondary">{{ $videogame->descrizione_videogame }}</h5>
                        <h6 class="card-subtitle mb-3">Anno: {{ $videogame->anno_videogame }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

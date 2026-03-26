@extends('layouts.videogames')

@section('titolo', 'VIDEOGAME')

@section('contenuto')
    <div class="row">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title mb-5">{{ $videogame->titolo_videogame }}</h4>
                    <p class="card-text">Descrizione: {{ $videogame->descrizione_videogame }}</p>
                    <p class="card-text">Anno di uscita: {{ $videogame->anno_videogame }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

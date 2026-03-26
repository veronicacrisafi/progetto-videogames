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
                    <div class="d-flex py-4">
                        <a href="{{ route('videogames.edit', $videogame) }}" class="btn btn-outline-warning">Modifica</a>
                        <form action="{{ route('videogames.destroy', $videogame) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-outline-danger" value="Elimina">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

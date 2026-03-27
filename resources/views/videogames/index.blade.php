@extends('layouts.videogames')
@section('titolo', 'Tutti i videogames')
@section('contenuto')
    <a href="{{ route('videogames.create') }}" class="btn btn-outline-success my-4">Aggiungi nuovo videogame</a>

    <div class="row">
        @foreach ($videogames as $videogame)
            <div class="col-4 my-3">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title mb-3">{{ $videogame->titolo_videogame }}</h4>
                        <div class="mb-3">
                            <p>Genere:</p>
                            @if (count($videogame->genres) > 0)
                                @foreach ($videogame->genres as $genre)
                                    <span class="badge"
                                        style="background-color: {{ $genre->colore }}">{{ $genre->genere_videogame }}</span>
                                @endforeach
                            @endif
                        </div>
                        <h5 class="card-subtitle mb-4 text-color-secondary">{{ $videogame->descrizione_videogame }}</h5>
                        <h6 class="card-subtitle mb-3">Anno: {{ $videogame->anno_videogame }}</h6>
                        <div class="mt-auto">
                            <a class='btn btn-outline-primary w-100'
                                href="{{ route('videogames.show', $videogame->id) }}">Visualizza</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

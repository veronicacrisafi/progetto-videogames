@extends('layouts.videogames')

@section('titolo', 'VIDEOGAME')
@section('backLink')
    <p class="mb-3">
        <a class="btn btn-outline-secondary" href="{{ route('videogames.index') }}">🔙 confermo e torno ai videogames</a>
    </p>
@endsection
@section('contenuto')
    <div class="row">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title mb-5">{{ $videogame->titolo_videogame }}</h4>
                    <div class="mb-3">
                        @if (count($videogame->genres) > 0)
                            @foreach ($videogame->genres as $genre)
                                <span class="badge"
                                    style="background-color: {{ $genre->colore }}">{{ $genre->genere_videogame }}</span>
                            @endforeach
                        @endif
                    </div>
                    <p class="card-text">Descrizione: {{ $videogame->descrizione_videogame }}</p>
                    <p class="card-text">Anno di uscita: {{ $videogame->anno_videogame }}</p>
                    <div class="d-flex py-4">
                        <a href="{{ route('videogames.edit', $videogame) }}"
                            class="btn btn-outline-warning w-50">Modifica</a>
                        <button type="button" class="btn btn-outline-danger w-50" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare la tipologia?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('videogames.destroy', $videogame) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="Elimina">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

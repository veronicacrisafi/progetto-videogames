@extends('layouts.videogames')
@section('titolo', 'Aggiungi un videogame!')
@section('contenuto')

    <form action="{{ route('videogames.update', $videogame) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-control mb-3 d-flex flex-column">
            <label for="titolo_videogame">Titolo Videogame</label>
            <input type="text" name="titolo_videogame" id="titolo_videogame" class="rounded"
                value="{{ $videogame->titolo_videogame }}" required>
        </div>
        <div class="form-control mb-3 d-flex flex-wrap align-items-start">
            @foreach ($genres as $genre)
                <div class="genre me-3 mb-2 d-flex align-items-center" style="min-width: 200px;">
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" id="genre-{{ $genre->id }}"
                        {{ $videogame->genres->contains($genre->id) ? 'checked' : '' }} class="me-1">
                    <label for="genre-{{ $genre->id }}">{{ $genre->genere_videogame }}</label>
                </div>
            @endforeach
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="descrizione_videogame">Descrizione</label>
            <input type="text" name="descrizione_videogame" id="descrizione_videogame" class="rounded"
                value="{{ $videogame->descrizione_videogame }}" required>
        </div>
        <div class="form-control mb-3 d-flex flex-wrap align-items-start">
            @foreach ($consoles as $console)
                <div class="console me-3 mb-2 d-flex align-items-center" style="min-width: 200px;">
                    <input type="checkbox" name="consoles[]" value="{{ $console->id }}" id="console-{{ $console->id }}"
                        {{ $videogame->consoles->contains($consoles->id) ? 'checked' : '' }} class="me-1">
                    <label for="console-{{ $console->id }}">{{ $console->nome_console }}</label>
                </div>
            @endforeach
        </div>
        <div class="form-control mb-3 d-flex flex-column">
            <label for="anno_videogame">Anno uscita videogame</label>
            <input type="year" name="anno_videogame" id="anno_videogame" class="rounded"
                value="{{ $videogame->anno_videogame }}" required>
        </div>
        <div class="d-flex flex-row gap-2">
            <input type="submit" class="btn btn-outline-success w-50" value="Salva">
            <a href="{{ route('videogames.index') }}" class="btn btn-outline-secondary w-50">Indietro</a>
        </div>

    </form>

@endsection

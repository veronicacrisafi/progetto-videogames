@extends('layouts.videogames')
@section('titolo', 'Aggiungi un videogame!')
@section('contenuto')
    @if ($errors->any())
        <div class="alert alert-danger soft-alert mb-4">
            Controlla i campi del form prima di salvare.
        </div>
    @endif

    <form action="{{ route('videogames.store') }}" method="POST" class="form-shell">
        @csrf
        <div class="field-panel mb-3">
            <label for="titolo_videogame" class="form-label">Titolo Videogame</label>
            <input type="text" name="titolo_videogame" id="titolo_videogame" class="form-control"
                value="{{ old('titolo_videogame') }}" required>
        </div>

        <div class="field-panel mb-3">
            <p class="form-label mb-3">Generi</p>
            <div class="chip-grid">
                @foreach ($genres as $genre)
                    <label class="choice-chip" for="genre-{{ $genre->id }}">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}" id="genre-{{ $genre->id }}"
                            class="form-check-input" {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                        <span>{{ $genre->genere_videogame }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="field-panel mb-3">
            <label for="descrizione_videogame" class="form-label">Descrizione</label>
            <textarea name="descrizione_videogame" id="descrizione_videogame" class="form-control" rows="5" required>{{ old('descrizione_videogame') }}</textarea>
        </div>

        <div class="field-panel mb-3">
            <p class="form-label mb-3">Console</p>
            <div class="chip-grid">
                @foreach ($consoles as $console)
                    <label class="choice-chip" for="console-{{ $console->id }}">
                        <input type="checkbox" name="consoles[]" value="{{ $console->id }}"
                            id="console-{{ $console->id }}" class="form-check-input"
                            {{ in_array($console->id, old('consoles', [])) ? 'checked' : '' }}>
                        <span>{{ $console->nome_console }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="field-panel mb-3">
            <label for="anno_videogame" class="form-label">Anno uscita videogame</label>
            <input type="number" name="anno_videogame" id="anno_videogame" class="form-control" min="1950"
                max="2100" value="{{ old('anno_videogame') }}" required>
        </div>

        <div class="field-panel mb-4">
            <label for="developer_id" class="form-label">Sviluppatore</label>
            <select name="developer_id" id="developer_id" class="form-select" required>
                <option value="" disabled selected>Seleziona uno sviluppatore</option>
                @foreach ($developers as $developer)
                    <option value="{{ $developer->id }}" {{ old('developer_id') == $developer->id ? 'selected' : '' }}>
                        {{ $developer->nome_sviluppatore }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex flex-column flex-md-row gap-3">
            <input type="submit" class="btn btn-brand w-100" value="Salva">
            <a href="{{ route('videogames.index') }}" class="btn btn-ghost w-100">Indietro</a>
        </div>

    </form>

@endsection

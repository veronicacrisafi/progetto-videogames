@extends('layouts.videogames')
@section('titolo', 'Tutti i videogames')
@section('contenuto')
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
        <div>
            <span class="eyebrow">Catalogo completo</span>
            <p class="section-copy mb-0">{{ $videogames->count() }} titoli disponibili, con accesso rapido a scheda, modifica
                ed eliminazione.</p>
        </div>
        <a href="{{ route('videogames.create') }}" class="btn btn-brand">Aggiungi nuovo videogame</a>
    </div>

    <div class="row g-4">
        @foreach ($videogames as $videogame)
            <div class="col-md-6 col-xl-4">
                <article class="game-card h-100">
                    <div class="game-card__content d-flex flex-column h-100">
                        <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                            <div>
                                <span class="game-card__eyebrow">{{ $videogame->anno_videogame }}</span>
                                <h3 class="game-card__title mb-0">{{ $videogame->titolo_videogame }}</h3>
                            </div>
                            <span class="meta-chip"><i class="bi bi-controller"></i>{{ count($videogame->consoles) }}</span>
                        </div>

                        <div class="mb-3">
                            <p class="label-title">Genere</p>
                            @if (count($videogame->genres) > 0)
                                @foreach ($videogame->genres as $genre)
                                    <span class="badge genre-badge"
                                        style="background-color: {{ $genre->colore }}">{{ $genre->genere_videogame }}</span>
                                @endforeach
                            @endif
                        </div>

                        <p class="label-title">Descrizione</p>
                        <p class="game-card__text">{{ Str::limit($videogame->descrizione_videogame, 140) }}</p>

                        <div class="mb-3">
                            <p class="label-title">Console</p>
                            @if (count($videogame->consoles) > 0)
                                @foreach ($videogame->consoles as $console)
                                    <span class="badge console-badge">{{ $console->nome_console }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="game-card__footer mt-auto">
                            <span><i
                                    class="bi bi-building"></i>{{ $videogame->developer?->nome_sviluppatore ?? 'Nessuno sviluppatore' }}</span>
                        </div>

                        <div class="mt-4">
                            <a class='btn btn-ghost w-100'
                                href="{{ route('videogames.show', $videogame->id) }}">Visualizza</a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endsection

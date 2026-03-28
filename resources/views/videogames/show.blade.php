@extends('layouts.videogames')

@section('titolo', 'VIDEOGAME')
@section('backLink')
    <a class="btn btn-ghost" href="{{ route('videogames.index') }}">Torna al catalogo</a>
@endsection
@section('contenuto')
    <div class="row g-4">
        <div class="col-lg-8">
            <article class="game-card h-100">
                <div class="game-card__content">
                    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
                        <div>
                            <span class="game-card__eyebrow">{{ $videogame->anno_videogame }}</span>
                            <h2 class="detail-title mb-0">{{ $videogame->titolo_videogame }}</h2>
                        </div>
                        <div class="meta-stack justify-content-lg-end">
                            <span class="meta-chip"><i
                                    class="bi bi-calendar-event"></i>{{ $videogame->anno_videogame }}</span>
                            <span class="meta-chip"><i
                                    class="bi bi-building"></i>{{ $videogame->developer?->nome_sviluppatore ?? 'Nessuno sviluppatore' }}</span>
                        </div>
                    </div>

                    @if ($videogame->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $videogame->image) }}" alt="copertina">
                        </div>
                    @endif

                    <div class="mb-4">
                        <p class="label-title">Generi</p>
                        @if (count($videogame->genres) > 0)
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($videogame->genres as $genre)
                                    <span class="badge genre-badge"
                                        style="background-color: {{ $genre->colore }}">{{ $genre->genere_videogame }}</span>
                                @endforeach
                            </div>
                        @else
                            <p class="detail-copy mb-0">Nessun genere associato.</p>
                        @endif
                    </div>

                    <div class="detail-block mb-4">
                        <p class="label-title">Descrizione</p>
                        <p class="detail-copy mb-0">{{ $videogame->descrizione_videogame }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="label-title">Console disponibili</p>
                        @if (count($videogame->consoles) > 0)
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($videogame->consoles as $console)
                                    <span class="badge console-badge">{{ $console->nome_console }}</span>
                                @endforeach
                            </div>
                        @else
                            <p class="detail-copy mb-0">Nessuna console associata.</p>
                        @endif
                    </div>

                    <div class="d-flex flex-column flex-md-row gap-3 pt-3">
                        <a href="{{ route('videogames.edit', $videogame) }}" class="btn btn-brand w-100">Modifica</a>
                        <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Elimina
                        </button>
                    </div>
                </div>
            </article>
        </div>

        <div class="col-lg-4">
            <aside class="glass-card h-100">
                <span class="eyebrow">Scheda rapida</span>
                <h3 class="section-title mt-2">Metadati</h3>
                <div class="detail-list mt-4">
                    <div>
                        <span>Anno di uscita</span>
                        <strong>{{ $videogame->anno_videogame }}</strong>
                    </div>
                    <div>
                        <span>Sviluppatore</span>
                        <strong>{{ $videogame->developer?->nome_sviluppatore ?? 'Nessuno sviluppatore' }}</strong>
                    </div>
                    <div>
                        <span>Generi associati</span>
                        <strong>{{ count($videogame->genres) }}</strong>
                    </div>
                    <div>
                        <span>Console associate</span>
                        <strong>{{ count($videogame->consoles) }}</strong>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content app-modal">
                <div class="modal-header border-0 pb-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare definitivamente questo videogame dal catalogo?
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-ghost" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('videogames.destroy', $videogame) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="Elimina">
                    </form>
                </div>
            </div>
        </div>
    </div>

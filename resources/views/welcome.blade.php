@extends('layouts.app')
@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="hero-panel">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="eyebrow">Curated gaming archive</span>
                        <h1 class="hero-title">Un catalogo di videogiochi con un look molto più deciso.</h1>
                        <p class="hero-copy">
                            Gestisci titoli, generi, console e sviluppatori dentro un’interfaccia più editoriale, leggibile
                            e moderna.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            @auth
                                <a href="{{ route('videogames.index') }}" class="btn btn-brand btn-lg">Apri il catalogo</a>
                                <a href="{{ route('dashboard') }}" class="btn btn-ghost btn-lg">Vai alla dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-brand btn-lg">Accedi</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-ghost btn-lg">Crea un account</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-aside">
                            <div class="hero-aside__card">
                                <span class="hero-aside__label">Snapshot archivio</span>
                                <div class="stats-grid mt-3">
                                    <div class="stat-card">
                                        <strong>{{ $stats['videogames'] }}</strong>
                                        <span>Videogiochi</span>
                                    </div>
                                    <div class="stat-card">
                                        <strong>{{ $stats['genres'] }}</strong>
                                        <span>Generi</span>
                                    </div>
                                    <div class="stat-card">
                                        <strong>{{ $stats['consoles'] }}</strong>
                                        <span>Console</span>
                                    </div>
                                    <div class="stat-card">
                                        <strong>{{ $stats['developers'] }}</strong>
                                        <span>Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Ultimi inserimenti</span>
                    <h2 class="section-title">Titoli in evidenza</h2>
                </div>
                <p class="section-copy">Una panoramica rapida dei contenuti più recenti caricati nel catalogo.</p>
            </div>

            <div class="row g-4">
                @forelse ($featuredVideogames as $videogame)
                    <div class="col-md-6 col-xl-4">
                        <article class="game-card h-100">
                            <div class="game-card__content">
                                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                    <div>
                                        <span class="game-card__eyebrow">{{ $videogame->anno_videogame }}</span>
                                        <h3 class="game-card__title">{{ $videogame->titolo_videogame }}</h3>
                                    </div>
                                    <span class="meta-chip"><i class="bi bi-stars"></i> New</span>
                                </div>

                                <p class="game-card__text">{{ Str::limit($videogame->descrizione_videogame, 110) }}</p>

                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    @foreach ($videogame->genres as $genre)
                                        <span class="badge genre-badge"
                                            style="background-color: {{ $genre->colore }}">{{ $genre->genere_videogame }}</span>
                                    @endforeach
                                </div>

                                <div class="game-card__footer mt-4">
                                    <span><i
                                            class="bi bi-building"></i>{{ $videogame->developer?->nome_sviluppatore ?? 'Nessuno sviluppatore' }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-controller"></i>
                            <h3>Nessun titolo ancora disponibile</h3>
                            <p>Il design è pronto: appena aggiungi i videogiochi, compariranno qui in evidenza.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

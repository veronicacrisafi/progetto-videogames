@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="hero-panel hero-panel--compact">
                <span class="eyebrow">Area personale</span>
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h1 class="page-hero__title">Dashboard</h1>
                        <p class="page-hero__text">Accesso rapido alle aree principali del progetto, con uno spazio più
                            ordinato per gestire catalogo e profilo.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('videogames.index') }}" class="btn btn-brand">Vai ai videogiochi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success soft-alert mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="glass-card h-100">
                        <span class="eyebrow">Stato account</span>
                        <h2 class="section-title mt-2">Sessione attiva</h2>
                        <p class="section-copy mb-4">Hai effettuato l’accesso correttamente e puoi gestire il tuo archivio
                            senza passaggi intermedi.</p>
                        <div class="meta-stack">
                            <span class="meta-chip"><i class="bi bi-shield-check"></i>Utente verificato</span>
                            <span class="meta-chip"><i class="bi bi-lightning-charge"></i>Accesso pronto</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <a href="{{ route('videogames.index') }}" class="action-card h-100 text-decoration-none">
                                <i class="bi bi-collection-play action-card__icon"></i>
                                <h3>Catalogo videogiochi</h3>
                                <p>Apri la lista completa, consulta i dettagli e naviga tra i contenuti del database.</p>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('videogames.create') }}" class="action-card h-100 text-decoration-none">
                                <i class="bi bi-plus-square action-card__icon"></i>
                                <h3>Nuovo titolo</h3>
                                <p>Aggiungi rapidamente un videogame con metadati, generi, console e sviluppatore.</p>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('profile.edit') }}" class="action-card h-100 text-decoration-none">
                                <i class="bi bi-person-gear action-card__icon"></i>
                                <h3>Profilo</h3>
                                <p>Gestisci le informazioni dell’account e mantieni ordinata la tua area personale.</p>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/') }}" class="action-card h-100 text-decoration-none">
                                <i class="bi bi-house-door action-card__icon"></i>
                                <h3>Homepage</h3>
                                <p>Torna alla panoramica principale e visualizza il nuovo look dell’applicazione.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

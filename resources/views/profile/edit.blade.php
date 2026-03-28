@extends('layouts.app')
@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="hero-panel hero-panel--compact">
                <span class="eyebrow">Area personale</span>
                <h1 class="page-hero__title">Profilo</h1>
                <p class="page-hero__text">Aggiorna dati account, password e impostazioni sensibili da una schermata più
                    ordinata e leggibile.</p>
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            <div class="settings-stack">
                <div class="settings-card">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="settings-card">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="settings-card settings-card--danger">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </section>
@endsection

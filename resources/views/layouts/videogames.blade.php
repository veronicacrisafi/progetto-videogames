@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="hero-panel hero-panel--compact">
                <div class="row align-items-end g-4">
                    <div class="col-lg-8">
                        <span class="eyebrow">Gestionale catalogo</span>
                        <h1 class="page-hero__title">@yield('titolo')</h1>
                        <p class="page-hero__text">Consulta, aggiorna e organizza i tuoi videogiochi con una vista più pulita
                            e orientata ai contenuti.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        @yield('backLink')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section pt-0">
        <div class="container">
            @yield('contenuto')
        </div>
    </section>
@endsection

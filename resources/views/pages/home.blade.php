@extends('layouts.app')

@section('title', 'When and What')
@section('meta_description', 'When and What gives you a beautiful daily summary of everything you did — what you
    watched, listened to, where you ran, and where you went.')

@section('content')

    {{-- ── Hero ──────────────────────────────────────────────────── --}}
    <section class="hero">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <h1>Your day,<br><span class="accent">beautifully recalled.</span></h1>
                    <p class="lead mt-3 mb-4">
                        When and What pulls together your activity from Trakt, Strava, and ListenBrainz — plus your own
                        location check-ins and personal notes — into a single, clean daily rundown.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <button class="btn btn-cta btn-lg" disabled>
                            Coming Soon
                        </button>
                        <a href="{{ route('features') }}" class="btn btn-outline-secondary btn-lg">
                            See Features
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="screenshot-placeholder ratio ratio-16x9">
                        <img src="images/screenshots/dashboard.png" alt="Screenshot of whenandwhat.app dashboard" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── How it works ──────────────────────────────────────────── --}}
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">How it works</h2>
                <p class="section-subtitle">Three simple steps to a complete picture of your day.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-sm-6 col-lg-4 text-center">
                    <div class="step-number">1</div>
                    <h5 class="fw-700 mb-2">Connect your services</h5>
                    <p class="text-muted small">Link Trakt, Strava, and ListenBrainz to automatically import what you watch,
                        run, and listen to.</p>
                </div>
                <div class="col-sm-6 col-lg-4 text-center">
                    <div class="step-number">2</div>
                    <h5 class="fw-700 mb-2">Check in to places</h5>
                    <p class="text-muted small">Tap to check in wherever you are — restaurants, parks, venues, or anywhere
                        else you spend your time.</p>
                </div>
                <div class="col-sm-6 col-lg-4 text-center">
                    <div class="step-number">3</div>
                    <h5 class="fw-700 mb-2">Review your day</h5>
                    <p class="text-muted small">Open any day and see a clear, chronological rundown of everything that
                        happened — activities, places, notes, and more.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Integrations ──────────────────────────────────────────── --}}
    <section class="section section-alt">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Works with the services you already use</h2>
                <p class="section-subtitle">No manual logging needed — just connect and go.</p>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="integration-card">
                        <div class="integration-icon">🎬</div>
                        <h5>Trakt</h5>
                        <p>Movies and TV shows you've watched, automatically imported.</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="integration-card">
                        <div class="integration-icon">🚴</div>
                        <h5>Strava</h5>
                        <p>Runs, rides, and workouts synced from your Strava profile.</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="integration-card">
                        <div class="integration-icon">🎵</div>
                        <h5>ListenBrainz</h5>
                        <p>Music you've listened to throughout the day, track by track.</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="integration-card">
                        <div class="integration-icon">📍</div>
                        <h5>Locations</h5>
                        <p>Places you visit, pinned to a map and logged to your timeline.</p>
                    </div>
                </div>
            </div>
            <p class="text-center text-muted small mt-4">More integrations coming soon.</p>
        </div>
    </section>

    {{-- ── Feature highlights ────────────────────────────────────── --}}
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Everything in one place</h2>
                <p class="section-subtitle">Your activity, your way.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">📅</div>
                        <h5>Daily Summary</h5>
                        <p>A clean chronological view of everything that happened — on any day, past or present.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">🗺️</div>
                        <h5>Map View</h5>
                        <p>See where you went on an interactive map with all your check-ins plotted out.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h5>Activity Timeline</h5>
                        <p>Scroll through your day as a timeline — activities, check-ins, and media all in order.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">📝</div>
                        <h5>Personal Notes</h5>
                        <p>Drop a note on any day — a thought, a mood, a reminder. Notes live right in your timeline alongside everything else.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">🔒</div>
                        <h5>Private by Default</h5>
                        <p>Your data stays yours. Nothing is shared unless you choose to share it.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('features') }}" class="btn btn-outline-secondary">
                    View all features <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ── Pricing teaser ─────────────────────────────────────────── --}}
    <section class="section section-alt">
        <div class="container text-center">
            <h2 class="section-title">One price. Everything included.</h2>
            <p class="section-subtitle mb-5">No tiers, no feature gates — just pick how you'd like to pay.</p>
            <div class="row justify-content-center g-4 mb-4">
                <div class="col-sm-10 col-md-4 col-lg-3">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <h3 class="pricing-plan-name">Monthly</h3>
                            <div class="pricing-price">
                                <span class="pricing-currency">$</span><span class="pricing-amount">2</span><span
                                    class="pricing-period">/mo</span>
                            </div>
                        </div>
                        <a href="{{ route('pricing') }}" class="btn btn-outline-secondary w-100">See plan</a>
                    </div>
                </div>
                <div class="col-sm-10 col-md-4 col-lg-3">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <h3 class="pricing-plan-name">6 Months</h3>
                            <div class="pricing-price">
                                <span class="pricing-currency">$</span><span class="pricing-amount">10</span><span
                                    class="pricing-period">/6 mo</span>
                            </div>
                        </div>
                        <a href="{{ route('pricing') }}" class="btn btn-outline-secondary w-100">See plan</a>
                    </div>
                </div>
                <div class="col-sm-10 col-md-4 col-lg-3">
                    <div class="pricing-card pricing-card-featured">
                        <div class="pricing-badge">Best value</div>
                        <div class="pricing-card-header">
                            <h3 class="pricing-plan-name">Annual</h3>
                            <div class="pricing-price">
                                <span class="pricing-currency">$</span><span class="pricing-amount">15</span><span
                                    class="pricing-period">/yr</span>
                            </div>
                        </div>
                        <a href="{{ route('pricing') }}" class="btn btn-cta w-100">See plan</a>
                    </div>
                </div>
            </div>
            <a href="{{ route('pricing') }}" class="text-muted small">View full pricing details <i
                    class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
    </section>

    {{-- ── CTA Banner ────────────────────────────────────────────── --}}
    <div class="cta-banner">
        <div class="container">
            <h2>Ready to see your day?</h2>
            <p class="mb-4">Start building your daily record — it takes less than a minute to connect your first service.
            </p>
            <button class="btn btn-cta btn-lg" disabled>
                Coming Soon
            </button>
        </div>
    </div>

@endsection

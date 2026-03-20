@extends('layouts.app')

@section('title', 'Features')
@section('meta_description', 'Explore everything When and What can do — daily summaries, Trakt and Strava integration,
    music tracking, and location check-ins.')

@section('content')

    {{-- ── Page header ──────────────────────────────────────────── --}}
    <section class="hero" style="padding: 3.5rem 0 3rem;">
        <div class="container text-center" style="max-width: 640px;">
            <h1 style="font-size: clamp(1.75rem, 4vw, 2.75rem);">
                Everything your day <span class="accent">deserves to remember.</span>
            </h1>
            <p class="lead mt-3" style="font-size: 1rem;">
                When and What brings together your activity from multiple sources into a single, coherent view of how you
                spend your time.
            </p>
        </div>
    </section>

    {{-- ── Feature: Daily Summary ────────────────────────────────── --}}
    <section class="container">
        <div class="feature-detail">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge text-bg-light border mb-3"
                        style="font-size:0.75rem; color: var(--ww-accent) !important; border-color: var(--ww-accent) !important;">Daily
                        View</span>
                    <h3>Your complete daily summary</h3>
                    <p>Pick any date and instantly see a chronological rundown of everything that day contained — workouts,
                        movies, music, meals, and every place you stopped. No more piecing it together from five different
                        apps.</p>
                    <ul class="list-unstyled mt-3" style="font-size: 0.875rem; color: var(--ww-muted);">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Browse any past day in
                            your history</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Chronological timeline
                            with timestamps</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> All activity types
                            shown in one view</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="screenshot-placeholder ratio ratio-16x9">
                        <img src="images/screenshots/dashboard.png" alt="Screenshot of whenandwhat.app dashboard" />
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Feature: Trakt ────────────────────────────────────── --}}
        <div class="feature-detail">
            <div class="row align-items-center g-5 flex-lg-row-reverse">
                <div class="col-lg-6">
                    <span class="badge text-bg-light border mb-3" style="font-size:0.75rem;"><img src="/images/trakt.svg" height="25" class="me-2" /> Trakt Integration</span>
                    <h3>See what you watched</h3>
                    <p>Connect your Trakt account and your movie and TV watch history is automatically pulled in. Every
                        episode and film is logged with the time you watched it, so your entertainment is part of your day's
                        story.</p>
                    <ul class="list-unstyled mt-3" style="font-size: 0.875rem; color: var(--ww-muted);">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Movies and TV episodes,
                            automatically synced</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Show titles, episode
                            names, and watch times</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Works with any
                            Trakt-connected media player</li>
                    </ul>
                </div>
                <div class="col-lg-6 screenshot-panel-wrap">
                    <div class="screenshot-panel">
                        <img src="images/screenshots/trakt.png" class="mw-100" alt="Screenshot of whenandwhat.app dashboard trakt activities" />
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Feature: Strava ───────────────────────────────────── --}}
        <div class="feature-detail">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge text-bg-light border mb-3" style="font-size:0.75rem;"><img src="/images/strava-powered.svg" height="45" alt="Powered by Strava" /></span>
                    <h3>Log every run and ride</h3>
                    <p>Your Strava activities — runs, rides, walks, swims, and more — are pulled in automatically. See your
                        workout alongside everything else that happened that day for a complete picture of how active you
                        were.</p>
                    <ul class="list-unstyled mt-3" style="font-size: 0.875rem; color: var(--ww-muted);">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> All Strava activity
                            types supported</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Distance, duration, and
                            activity name shown</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Auto-syncs when new
                            activities are recorded</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="screenshot-placeholder ratio ratio-16x9">
                        <img src="images/screenshots/strava.png" alt="Screenshot of whenandwhat.app dashboard Strava activities" />
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Feature: ListenBrainz ─────────────────────────────── --}}
        <div class="feature-detail">
            <div class="row align-items-center g-5 flex-lg-row-reverse">
                <div class="col-lg-6">
                    <span class="badge text-bg-light border mb-3" style="font-size:0.75rem;">🎵 ListenBrainz
                        Integration</span>
                    <h3>Track what you listened to</h3>
                    <p>Connect your ListenBrainz account to see a record of every track you played. Music is part of your
                        day too — now it's logged alongside everything else.</p>
                    <ul class="list-unstyled mt-3" style="font-size: 0.875rem; color: var(--ww-muted);">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Track-level listening
                            history imported daily</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Artist and album
                            information included</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Works with any
                            ListenBrainz-compatible scrobbler</li>
                    </ul>
                </div>
                <div class="col-lg-6 screenshot-panel-wrap">
                    <div class="screenshot-panel">
                        <span>ListenBrainz screenshot</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Feature: Check-ins ────────────────────────────────── --}}
        <div class="feature-detail">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge text-bg-light border mb-3" style="font-size:0.75rem;">📍 Location Check-ins</span>
                    <h3>Remember where you went</h3>
                    <p>Check in to anywhere — a café, a park, a friend's place, a venue. Each check-in is added to your
                        timeline with the time and location, and plotted on a map so you can see your route through the day.
                    </p>
                    <ul class="list-unstyled mt-3" style="font-size: 0.875rem; color: var(--ww-muted);">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Quick check-ins from
                            any device</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Interactive map of
                            places visited</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Custom place names and
                            notes</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Completely private — your locations, not a third-party service</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="screenshot-placeholder ratio ratio-16x9">
                        <img src="images/screenshots/checkins.png" alt="Screenshot of whenandwhat.app dashboard location checkins" />
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Feature: Notes ─────────────────────────────────────── --}}
        <div class="feature-detail">
            <div class="row align-items-center g-5 flex-lg-row-reverse">
                <div class="col-lg-6">
                    <span class="badge text-bg-light border mb-3" style="font-size:0.75rem;">📝 Personal Notes</span>
                    <h3>Add context to any day</h3>
                    <p>Some moments don't come from an app — they come from you. Drop a note on any day to capture a
                        thought, a mood, something you want to remember. Notes live right in your timeline alongside your
                        activities and check-ins.</p>
                    <ul class="list-unstyled mt-3" style="font-size: 0.875rem; color: var(--ww-muted);">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Add a title, subtitle,
                            and freeform body text</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Pick an emoji icon to
                            make notes easy to spot</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Timestamped and
                            sorted into your day's chronological feed</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Browse all your notes
                            in one place, or find them in the daily view</li>
                    </ul>
                </div>
                <div class="col-lg-6 screenshot-panel-wrap">
                    <div class="screenshot-panel">
                        <img src="images/screenshots/notes.png" class="mw-100" alt="Screenshot of whenandwhat.app dashboard notes" />
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- ── CTA ───────────────────────────────────────────────────── --}}
    <div class="cta-banner mt-0">
        <div class="container">
            <h2>Start tracking your days</h2>
            <p class="mb-4">Connect your first integration in under a minute.</p>
            <a href="https://whenandwhat.app" target="_blank" rel="noopener" class="btn btn-cta btn-lg">
                Open When and What <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
            </a>
        </div>
    </div>

@endsection

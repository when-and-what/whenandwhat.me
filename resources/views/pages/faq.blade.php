@extends('layouts.app')

@section('title', 'FAQ & Integration Tips')
@section('meta_description', 'Frequently asked questions about When and What, plus tips for connecting Trakt, Strava, and ListenBrainz.')

@section('content')

{{-- ── Header ────────────────────────────────────────────────── --}}
<section class="hero" style="padding: 3.5rem 0 3rem;">
    <div class="container text-center" style="max-width: 600px;">
        <h1 style="font-size: clamp(1.75rem, 4vw, 2.5rem);">FAQ &amp; <span class="accent">Integration Tips</span></h1>
        <p class="lead mt-3" style="font-size: 1rem;">
            Common questions answered, plus step-by-step guides for connecting your services.
        </p>
    </div>
</section>

{{-- ── FAQ ───────────────────────────────────────────────────── --}}
<section class="section">
    <div class="container" style="max-width: 780px;">
        <h2 class="section-title mb-1">Frequently Asked Questions</h2>
        <p class="section-subtitle">Can't find your answer? <a href="https://whenandwhat.app" target="_blank" rel="noopener">Contact us through the app.</a></p>

        <livewire:accordion-faq />
    </div>
</section>

{{-- ── Integration Tips ──────────────────────────────────────── --}}
<section class="section section-alt">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Integration Tips</h2>
            <p class="section-subtitle">How to get the most out of each connected service.</p>
        </div>

        <div class="row g-4">

            {{-- Trakt --}}
            <div class="col-md-6 col-lg-4">
                <div class="tip-card h-100">
                    <h5>🎬 Trakt</h5>
                    <p class="text-muted small mb-3">Trakt tracks your movie and TV viewing. Connect it and your watch history will automatically appear in When and What.</p>

                    <div class="tip-step">
                        <div class="tip-step-num">1</div>
                        <div>Create a free account at <a href="https://trakt.tv" target="_blank" rel="noopener">trakt.tv</a> if you don't have one.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">2</div>
                        <div>In the When and What app, go to <strong>Settings → Integrations</strong> and click Connect Trakt.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">3</div>
                        <div>Authorise the connection on Trakt's website. Your history will sync automatically.</div>
                    </div>

                    <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> Install a Trakt scrobbler for your media player (Plex, Kodi, Infuse, etc.) so plays are logged automatically without any manual input.</p>
                </div>
            </div>

            {{-- Strava --}}
            <div class="col-md-6 col-lg-4">
                <div class="tip-card h-100">
                    <h5>🚴 Strava</h5>
                    <p class="text-muted small mb-3">Strava tracks your runs, rides, swims, and more. Once connected, every recorded activity will appear in your daily summary.</p>

                    <div class="tip-step">
                        <div class="tip-step-num">1</div>
                        <div>Create a free account at <a href="https://www.strava.com" target="_blank" rel="noopener">strava.com</a> if you don't have one.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">2</div>
                        <div>In When and What, go to <strong>Settings → Integrations</strong> and click Connect Strava.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">3</div>
                        <div>Approve the Strava authorisation. New activities will sync within minutes of being recorded.</div>
                    </div>

                    <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> Most GPS watches (Garmin, Polar, Apple Watch) can auto-upload activities to Strava, keeping your When and What feed completely hands-free.</p>
                </div>
            </div>

            {{-- ListenBrainz --}}
            <div class="col-md-6 col-lg-4">
                <div class="tip-card h-100">
                    <h5>🎵 ListenBrainz</h5>
                    <p class="text-muted small mb-3">ListenBrainz is a free, open platform for tracking your music listening history. Connect it to see every track in your daily timeline.</p>

                    <div class="tip-step">
                        <div class="tip-step-num">1</div>
                        <div>Create a free account at <a href="https://listenbrainz.org" target="_blank" rel="noopener">listenbrainz.org</a>.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">2</div>
                        <div>In When and What, go to <strong>Settings → Integrations</strong> and enter your ListenBrainz username.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">3</div>
                        <div>Your listening history will be imported and will keep syncing as you listen.</div>
                    </div>

                    <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> Set up a scrobbler to send listens from Spotify, Apple Music, or your local player to ListenBrainz automatically. Popular options include <a href="https://github.com/InputUsername/rescrobbled" target="_blank" rel="noopener">Rescrobbled</a> and the official ListenBrainz integrations.</p>
                </div>
            </div>

            {{-- Check-ins --}}
            <div class="col-md-6 col-lg-4">
                <div class="tip-card h-100">
                    <h5>📍 Location Check-ins</h5>
                    <p class="text-muted small mb-3">Check-ins are manual — you log them when you arrive somewhere. Here's how to make them part of your routine.</p>

                    <div class="tip-step">
                        <div class="tip-step-num">1</div>
                        <div>Open the When and What app and tap <strong>Check In</strong> when you arrive at a new place.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">2</div>
                        <div>Give the place a name (e.g. "Coffee shop on Main St" or the venue's actual name).</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">3</div>
                        <div>Your check-in appears in your timeline and on your day's map view.</div>
                    </div>

                    <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> Add a browser shortcut or home screen icon to the app for quick access — the fewer taps to check in, the more likely you'll remember to do it.</p>
                </div>
            </div>

            {{-- General tips --}}
            <div class="col-md-6 col-lg-4">
                <div class="tip-card h-100">
                    <h5>💡 General Tips</h5>
                    <p class="text-muted small mb-3">Get the most out of When and What with these habits.</p>

                    <div class="tip-step">
                        <div class="tip-step-num">✓</div>
                        <div><strong>Review at the end of the day</strong> — a quick look before bed makes the summary feel satisfying and helps you catch any missing check-ins.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">✓</div>
                        <div><strong>Connect all your services</strong> — the more connected, the richer each day's summary becomes.</div>
                    </div>
                    <div class="tip-step">
                        <div class="tip-step-num">✓</div>
                        <div><strong>Check back on old days</strong> — your history accumulates over time and becomes a genuinely useful record of how you've spent your time.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ── CTA ───────────────────────────────────────────────────── --}}
<div class="cta-banner">
    <div class="container">
        <h2>Ready to connect your services?</h2>
        <p class="mb-4">Head to the app to link Trakt, Strava, and ListenBrainz.</p>
        <a href="https://whenandwhat.app" target="_blank" rel="noopener" class="btn btn-cta btn-lg">
            Open When and What <i class="bi bi-arrow-up-right ms-1"></i>
        </a>
    </div>
</div>

@endsection

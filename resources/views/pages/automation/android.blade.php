@extends('layouts.app')

@section('title', 'Automating with Tasker')
@section('meta_description', 'Use Tasker on Android to check in and log notes in When and What automatically.')

@section('content')

    {{-- ── Header ────────────────────────────────────────────────── --}}
    <section class="hero" style="padding: 3.5rem 0 3rem;">
        <div class="container text-center" style="max-width: 640px;">
            <p class="small mb-2"><a href="{{ route('faq') }}">&larr; FAQ &amp; Tips</a></p>
            <h1 style="font-size: clamp(1.75rem, 4vw, 2.5rem);">Automating with <span class="accent">Tasker</span></h1>
            <p class="lead mt-3" style="font-size: 1rem;">
                Use <a href="https://tasker.joaoapps.com" target="_blank" rel="noopener">Tasker</a> on Android to
                check in from a home screen widget, check in automatically by location or Wi-Fi, and log quick notes.
            </p>
            <p class="small text-muted mb-0">On iPhone? <a href="{{ route('automation.ios') }}">See the Shortcuts
                    guide.</a></p>
        </div>
    </section>

    @include('pages.automation.partials.token-setup', ['device' => 'Android Tasker'])

    <section class="section">
        <div class="container" style="max-width: 900px;">

            {{-- Example 1 --}}
            <div class="automation-example">
                <h3>1. "Check in here" task</h3>
                <p class="lead-text">A task that grabs your current location and sends it to When and What. Run it from
                    a home screen widget or a Quick Settings tile.</p>

                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="tip-step">
                            <div class="tip-step-num">1</div>
                            <div>In Tasker, open the <strong>Tasks</strong> tab, tap <strong>+</strong> and name the
                                task "Check in here".</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">2</div>
                            <div>Add <strong>Location › Get Location v2</strong>. This sets
                                <code>%gl_latitude</code> and <code>%gl_longitude</code>.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">3</div>
                            <div>Add <strong>Net › HTTP Request</strong> and fill it in like this:</div>
                        </div>
                        <pre class="code-block">Method:   POST
URL:      https://whenandwhat.app/api/locations/checkins/pending
Headers:  Authorization:Bearer YOUR_TOKEN
          Accept:application/json
          Content-Type:application/json
Body:     {"latitude": %gl_latitude, "longitude": %gl_longitude}</pre>
                        <div class="tip-step">
                            <div class="tip-step-num">4</div>
                            <div>Optionally add <strong>Alert › Flash</strong> with the text "Checked in 📍".</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">5</div>
                            <div>Long-press your home screen, add a <strong>Tasker › Task Shortcut</strong> widget and
                                pick the task.</div>
                        </div>

                        <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> If a check-in doesn't appear, run
                            the task from inside Tasker and check <code>%http_response_code</code> — <code>201</code>
                            means success, <code>401</code> means the token is wrong, and <code>422</code> means the
                            body is missing a field.</p>
                    </div>
                    <div class="col-lg-5">
                        <x-automation-shot src="images/screenshots/automation/android/checkin-task.png"
                            caption="The “Check in here” task" />
                    </div>
                </div>
            </div>

            {{-- Example 2 --}}
            <div class="automation-example">
                <h3>2. Check in automatically by place or Wi-Fi</h3>
                <p class="lead-text">Attach the task to a profile so it runs on its own whenever you arrive at the gym,
                    the office or anywhere else you go regularly.</p>

                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="tip-step">
                            <div class="tip-step-num">1</div>
                            <div>Open the <strong>Profiles</strong> tab and tap <strong>+</strong>.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">2</div>
                            <div>Choose <strong>Location</strong> and drop a pin with a sensible radius — or choose
                                <strong>State › Net › Wifi Connected</strong> and enter the network name, which is more
                                reliable indoors and easier on the battery.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">3</div>
                            <div>When asked for an Enter task, pick <strong>Check in here</strong>.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">4</div>
                            <div>To label the check-in, make a copy of the task for that place and add a name to the
                                body:</div>
                        </div>
                        <pre class="code-block">{"latitude": %gl_latitude, "longitude": %gl_longitude, "name": "Gym"}</pre>

                        <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> Make sure Tasker is excluded from
                            battery optimisation (<strong>Settings › Apps › Tasker › Battery › Unrestricted</strong>),
                            otherwise Android may stop profiles from firing in the background.</p>
                    </div>
                    <div class="col-lg-5">
                        <x-automation-shot src="images/screenshots/automation/android/location-profile.png"
                            caption="A location profile linked to the task" />
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ── CTA ───────────────────────────────────────────────────── --}}
    <div class="cta-banner">
        <div class="container">
            <h2>Something not working?</h2>
            <p class="mb-4">Send us your task setup and the response code you're seeing and we'll take a look.</p>
            <a class="btn btn-cta btn-lg" href="{{ route('contact') }}">Contact us</a>
        </div>
    </div>

@endsection

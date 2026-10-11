@extends('layouts.app')

@section('title', 'Automating with iOS Shortcuts')
@section('meta_description', 'Use Apple Shortcuts to check in and log notes in When and What automatically.')

@section('content')

    {{-- ── Header ────────────────────────────────────────────────── --}}
    <section class="hero" style="padding: 3.5rem 0 3rem;">
        <div class="container text-center" style="max-width: 640px;">
            <p class="small mb-2"><a href="{{ route('faq') }}">&larr; FAQ &amp; Tips</a></p>
            <h1 style="font-size: clamp(1.75rem, 4vw, 2.5rem);">Automating with <span class="accent">iOS Shortcuts</span></h1>
            <p class="lead mt-3" style="font-size: 1rem;">
                Build shortcuts that check you in with one tap, check you in automatically when you arrive somewhere,
                and log quick notes from your home screen.
            </p>
            <p class="small text-muted mb-0">Looking for Android? <a href="{{ route('automation.android') }}">See the
                    Tasker guide.</a></p>
        </div>
    </section>

    @include('pages.automation.partials.token-setup', ['device' => 'iPhone Shortcuts'])

    <section class="section">
        <div class="container" style="max-width: 900px;">

            {{-- Example 1 --}}
            <div class="automation-example">
                <h3>1. One-tap "Check in here"</h3>
                <p class="lead-text">Sends your current location to When and What. Add it to your home screen, Control
                    Centre, Action button, Apple Watch, etc. for the quickest possible check-in.</p>

                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="tip-step">
                            <div class="tip-step-num">1</div>
                            <div>Open <strong>Shortcuts</strong>, tap <strong>+</strong> and name the shortcut
                                "Check in here".</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">2</div>
                            <div>Add <strong>Get Current Location</strong>.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">3</div>
                            <div>Add <strong>Get Contents of URL</strong> and set the URL to
                                <code>https://whenandwhat.app/api/locations/checkins/pending</code>.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">4</div>
                            <div>Expand it and set <strong>Method</strong> to <strong>POST</strong>. Add two headers:
                                <code>Authorization</code> = <code>Bearer YOUR_TOKEN</code> and <code>Accept</code> =
                                <code>application/json</code>.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">5</div>
                            <div>Set <strong>Request Body</strong> to <strong>JSON</strong> and add three Text fields,
                                inserting the <em>Current Location</em> variable and tapping it to pick the detail:
                            </div>
                        </div>
                        <pre class="code-block">
latitude   →  Current Location › Latitude
longitude  →  Current Location › Longitude</pre>
                        <div class="tip-step">
                            <div class="tip-step-num">6</div>
                            <div>Optionally add <strong>Show Notification</strong> with the text "Checked in 📍" so you
                                know it worked.</div>
                        </div>

                        <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> To add a note each time, put an
                            <strong>Ask for Input</strong> action before the request and add a <code>note</code> field
                            set to <em>Provided Input</em>.</p>
                    </div>
                    <div class="col-lg-5">
                        <x-automation-shot src="images/screenshots/automation/ios/pending.jpeg"
                            caption="The finished “Check in here” shortcut" />
                    </div>
                </div>
            </div>

            {{-- Example 2 --}}
            <div class="automation-example">
                <h3>2. Check in automatically when you arrive</h3>
                <p class="lead-text">Create a shortcut to checkin to the given location. Here's an example to copy and paste in your access token: <a href="https://www.icloud.com/shortcuts/a7f29722befa41918a818734f76b12c4" target="_blank">iOS Shortcut</a></p>
                <p class="lead-text">Pair the shortcut above with a personal automation so places you visit often —
                    the gym, the office, a favourite café — are logged without you touching your phone.</p>

                <div class="row g-4">
                    <div class="col-lg-7">
                        You'll first need the ID for the location you're wanting to checkin
                        <div class="tip-step">
                            <div class="tip-step-num">1</div>
                            <div>Find the location you're wanting to automate on you <a href="https://whenandwhat.app/locations/checkins" target="_blank">recent checkins</a> or search for a <a href="https://whenandwhat.app/locations" target="_blank">location</a>.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">2</div>
                            <div>After clicking on the location grab the location ID from the URL</div>
                        </div>
                        <p class="text-muted small mt-3 mb-0">If the URL is https://whenandwhat.app/locations/<strong>437</strong>, your location ID is <strong>437</strong></p>
                        <p class="lead-text">Next build the shortcut for this location</p>
                        <div class="tip-step">
                            <div class="tip-step-num">1</div>
                            <div>In Shortcuts, open the <strong>Automation</strong> tab and tap <strong>+</strong>.
                            </div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">2</div>
                            <div>Choose <strong>Arrive</strong>, pick the location and adjust the radius.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">3</div>
                            <div>Select <strong>Run Immediately</strong> so it doesn't ask for confirmation, and turn
                                off <strong>Notify When Run</strong> if you prefer it silent.</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">4</div>
                            <div>Enter the location ID in a dictionary variable with an optional note</div>
                        </div>
                        <div class="tip-step">
                            <div class="tip-step-num">5</div>
                            <div>Tap <strong>Next</strong> and choose your <strong>Check in here</strong> shortcut.
                            </div>
                        </div>

                        <p class="text-muted small mt-3 mb-0"><strong>Tip:</strong> You can also trigger the same
                            shortcut from an <strong>NFC</strong> tag (stick one by your front door or desk) or when
                            your phone joins a particular <strong>Wi-Fi</strong> network.</p>
                    </div>
                    <div class="col-lg-5">
                        <x-automation-shot src="images/screenshots/automation/ios/checkin.jpeg"
                            caption="An “Arrive” personal automation" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── CTA ───────────────────────────────────────────────────── --}}
    <div class="cta-banner">
        <div class="container">
            <h2>Something not working?</h2>
            <p class="mb-4">Send us the shortcut details and the error you're seeing and we'll take a look.</p>
            <a class="btn btn-cta btn-lg" href="{{ route('contact') }}">Contact us</a>
        </div>
    </div>

@endsection

{{-- ── Before you start ──────────────────────────────────────── --}}
<section class="section section-alt">
    <div class="container" style="max-width: 900px;">
        <h2 class="section-title mb-1">Before you start</h2>
        <p class="section-subtitle">Every example talks to the When and What API, so you'll need an API token first.</p>

        <div class="row g-4 mt-1">
            <div class="col-lg-7">

                <h5 class="mt-4" style="font-size: 1rem; font-weight: 700;">API reference</h5>
                <p class="text-muted small">All requests need these two headers:</p>
                <pre class="code-block">Authorization: Bearer YOUR_TOKEN
Accept: application/json</pre>

                <p class="small mb-1"><strong>Check in where you are</strong> — creates a pending check-in you can
                    confirm in the app. <code>name</code> and <code>note</code> are optional.</p>
                <pre class="code-block">POST https://whenandwhat.app/api/locations/checkins/pending

{
  "latitude": 51.5072,
  "longitude": -0.1276,
  "name": "Coffee shop",
  "note": "Flat white"
}</pre>

                <p class="small mb-1"><strong>Log a note</strong> — appears on your dashboard at the current time. <code>sub_title</code> and <code>icon</code> are optional.</p>
                <pre class="code-block">POST https://whenandwhat.app/api/notes/dashboard

{
  "title": "Took my vitamins",
  "sub_title": "Morning routine",
  "icon": "💊"
}</pre>
            </div>
        </div>
    </div>
</section>

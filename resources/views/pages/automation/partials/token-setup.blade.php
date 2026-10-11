{{-- ── Before you start ──────────────────────────────────────── --}}
<section class="section section-alt">
    <div class="container" style="max-width: 900px;">
        <h2 class="section-title mb-1">Before you start</h2>
        <p class="section-subtitle">Every example talks to the When and What API, so you'll need an API token first.</p>

        <div class="row g-4 mt-1">
            <div class="col-lg-8">
                <div class="tip-step">
                    <div class="tip-step-num">1</div>
                    <div>Log in at <a href="https://whenandwhat.app/user/api-tokens" target="_blank" rel="noopener">whenandwhat.app</a>,
                        open your profile menu and choose <strong><a href="https://whenandwhat.app/user/api-token" target="_blank">API Tokens</a></strong>.</div>
                </div>
                <div class="tip-step">
                    <div class="tip-step-num">2</div>
                    <div>Give the token a name (e.g. "{{ $device }}") and click <strong>Create</strong>.</div>
                </div>
                <div class="tip-step">
                    <div class="tip-step-num">3</div>
                    <div>Copy the token straight away — it's only shown once. Treat it like a password: anyone with it
                        can add or view entries to your account. You can revoke it from the same page at any time.</div>
                </div>
            </div>
            <div class="col-lg-4">
                <x-automation-shot src="images/screenshots/automation/create-token.png"
                    caption="Creating an API token in When and What" />
            </div>
        </div>
    </div>
</section>

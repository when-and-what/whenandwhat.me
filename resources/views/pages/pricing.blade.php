@extends('layouts.app')

@section('title', 'Pricing — When and What')
@section('meta_description', 'Simple, affordable pricing for When and What. $2/month, $10/6 months, or $15/year — everything included, no hidden fees.')

@section('content')

    {{-- ── Header ─────────────────────────────────────────────────── --}}
    <section class="section text-center pb-3">
        <div class="container">
            <h1 class="section-title">Simple, honest pricing</h1>
            <p class="section-subtitle">Everything included. No tiers, no feature gates — just choose how you want to pay.
            </p>
        </div>
    </section>

    {{-- ── Features list ────────────────────────────────────────────── --}}
    <section class="pb-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <ul class="pricing-features">
                        <li><i class="fa-solid fa-check"></i> Full daily activity summaries</li>
                        <li><i class="fa-solid fa-check"></i> Trakt, Strava &amp; ListenBrainz sync</li>
                        <li><i class="fa-solid fa-check"></i> Location check-ins</li>
                        <li><i class="fa-solid fa-check"></i> Unlimited history</li>
                        <li><i class="fa-solid fa-check"></i> Add notes to your timeline detailing your day</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Pricing Cards ───────────────────────────────────────────── --}}
    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center g-4">

                {{-- Monthly --}}
                <div class="col-sm-10 col-md-4 col-lg-3">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <h2 class="pricing-plan-name">Monthly</h2>
                            <div class="pricing-price">
                                <span class="pricing-currency">$</span><span class="pricing-amount">2</span><span
                                    class="pricing-period">/mo</span>
                            </div>
                            <p class="pricing-description">Pay as you go, cancel anytime.</p>
                        </div>
                        <button class="btn btn-outline-secondary w-100 btn-lg mt-auto" disabled>
                            Coming Soon
                        </button>
                    </div>
                </div>

                {{-- 6-Month --}}
                <div class="col-sm-10 col-md-4 col-lg-3">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <h2 class="pricing-plan-name">6 Months</h2>
                            <div class="pricing-price">
                                <span class="pricing-currency">$</span><span class="pricing-amount">10</span><span
                                    class="pricing-period">/6 mo</span>
                            </div>
                            <p class="pricing-description">Save $2 vs monthly — renews every six months.</p>
                        </div>
                        <button class="btn btn-outline-secondary w-100 btn-lg mt-auto" disabled>
                            Coming Soon
                        </button>
                    </div>
                </div>

                {{-- Annual --}}
                <div class="col-sm-10 col-md-4 col-lg-3">
                    <div class="pricing-card pricing-card-featured">
                        <div class="pricing-badge">Best value</div>
                        <div class="pricing-card-header">
                            <h2 class="pricing-plan-name">Annual</h2>
                            <div class="pricing-price">
                                <span class="pricing-currency">$</span><span class="pricing-amount">15</span><span
                                    class="pricing-period">/yr</span>
                            </div>
                            <p class="pricing-description">Save $9 compared to monthly — that's 3 months free.</p>
                        </div>
                        <button class="btn btn-cta w-100 btn-lg mt-auto" disabled>
                            Coming Soon
                        </button>
                    </div>
                </div>

            </div>

            <p class="text-center text-muted mb-5">Every plan includes every feature</p>

            {{-- Fine print --}}
            <p class="text-center text-muted small mt-4">
                Payments are processed securely by <a href="https://stripe.com" target="_blank" rel="noopener">Stripe</a>.
                Subscriptions renew automatically and can be cancelled at any time from your account settings.
            </p>
        </div>
    </section>

    {{-- ── FAQ strip ───────────────────────────────────────────────── --}}
    <section class="section section-alt">
        <div class="container">
            <h2 class="text-center section-title mb-5">Common questions</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="pricing-faq-item">
                        <h5>Can I switch between plans?</h5>
                        <p>Yes. You can switch billing periods at any time from your account settings. When switching to
                            a longer plan your remaining credit is applied.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>What happens if I cancel?</h5>
                        <p>You keep full access until the end of your current billing period. After that your account is
                            paused — your data is retained for 30 days so you can reactivate without losing anything.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>Is there a free trial?</h5>
                        <p>Yes! After signing up you will recieve one month free. You'll have unlimited use and can then signup for the monthly or yearly trial at anypoint during your trial.</p>
                    </div>

                    <div class="pricing-faq-item border-0 mb-0 pb-0">
                        <h5>Is my payment information secure?</h5>
                        <p>Yes. We never see or store your card details — payments are handled entirely by <a href="https://stripe.com" target="_blank" rel="noopener">Stripe</a>, one of the most trusted
                            payment processors in the world.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ── CTA ─────────────────────────────────────────────────────── --}}
    <div class="cta-banner">
        <div class="container">
            <h2>Ready to start?</h2>
            <p class="mb-4">Pick a plan and have your first daily summary ready in minutes.</p>
            <button class="btn btn-cta btn-lg" disabled>
                Coming Soon
            </button>
        </div>
    </div>

@endsection

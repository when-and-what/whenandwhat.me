@extends('layouts.app')

@section('title', 'Pricing — When and What')
@section('meta_description', 'Simple, affordable pricing for When and What. $2/month or $15/year — everything included,
    no hidden fees.')

@section('content')

    {{-- ── Header ─────────────────────────────────────────────────── --}}
    <section class="section text-center">
        <div class="container">
            <h1 class="section-title">Simple, honest pricing</h1>
            <p class="section-subtitle">Everything included. No tiers, no feature gates — just choose how you want to pay.
            </p>
        </div>
    </section>

    {{-- ── Pricing Cards ───────────────────────────────────────────── --}}
    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center g-4">

                {{-- Monthly --}}
                <div class="col-sm-10 col-md-5 col-lg-4">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <h2 class="pricing-plan-name">Monthly</h2>
                            <div class="pricing-price">
                                <span class="pricing-currency">$</span><span class="pricing-amount">2</span><span
                                    class="pricing-period">/mo</span>
                            </div>
                            <p class="pricing-description">Pay as you go, cancel anytime.</p>
                        </div>
                        <ul class="pricing-features">
                            <li><i class="fa-solid fa-check"></i> Full daily activity summaries</li>
                            <li><i class="fa-solid fa-check"></i> Trakt, Strava &amp; ListenBrainz sync</li>
                            <li><i class="fa-solid fa-check"></i> Location check-ins</li>
                            <li><i class="fa-solid fa-check"></i> Unlimited history</li>
                            <li><i class="fa-solid fa-check"></i> All future features included</li>
                        </ul>
                        <a href="https://whenandwhat.app/subscribe/monthly" target="_blank" rel="noopener"
                            class="btn btn-outline-secondary w-100 btn-lg">
                            Get started
                        </a>
                    </div>
                </div>

                {{-- Annual --}}
                <div class="col-sm-10 col-md-5 col-lg-4">
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
                        <ul class="pricing-features">
                            <li><i class="fa-solid fa-check"></i> Everything in Monthly</li>
                            <li><i class="fa-solid fa-check"></i> Full daily activity summaries</li>
                            <li><i class="fa-solid fa-check"></i> Trakt, Strava &amp; ListenBrainz sync</li>
                            <li><i class="fa-solid fa-check"></i> Location check-ins</li>
                            <li><i class="fa-solid fa-check"></i> Unlimited history</li>
                            <li><i class="fa-solid fa-check"></i> All future features included</li>
                        </ul>
                        <a href="https://whenandwhat.app/subscribe/annual" target="_blank" rel="noopener"
                            class="btn btn-cta w-100 btn-lg">
                            Get started
                        </a>
                    </div>
                </div>

            </div>

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
                        <h5>Can I switch between monthly and annual?</h5>
                        <p>Yes. You can switch billing periods at any time from your account settings. When switching to
                            annual your remaining monthly credit is applied.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>What happens if I cancel?</h5>
                        <p>You keep full access until the end of your current billing period. After that your account is
                            paused — your data is retained for 30 days so you can reactivate without losing anything.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>Do you offer refunds?</h5>
                        <p>If something isn't working for you in the first 7 days, reach out and we'll sort it out. Outside
                            that window, subscriptions are non-refundable but you can cancel to avoid future charges.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>Is there a free trial?</h5>
                        <p>We don't currently offer a free trial, but at $2/month it's easy to try risk-free. Reach out if
                            you have questions before subscribing.</p>
                    </div>

                    <div class="pricing-faq-item border-0 mb-0 pb-0">
                        <h5>Is my payment information secure?</h5>
                        <p>Yes. We never see or store your card details — payments are handled entirely by <a
                                href="https://stripe.com" target="_blank" rel="noopener">Stripe</a>, one of the most trusted
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
            <a href="https://whenandwhat.app" target="_blank" rel="noopener" class="btn btn-cta btn-lg">
                Open When and What <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
            </a>
        </div>
    </div>

@endsection

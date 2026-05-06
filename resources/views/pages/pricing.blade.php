@extends('layouts.app')

@section('title', 'Pricing — When and What')
@section('meta_description', 'Simple, affordable pricing for When and What. Choose web-only or add mobile app access — pay monthly, every six months, or yearly.')

@section('content')

    {{-- ── Header ─────────────────────────────────────────────────── --}}
    <section class="section text-center pb-3">
        <div class="container">
            <h1 class="section-title">Simple, honest pricing</h1>
            <p class="section-subtitle">Two plans to choose from — pick the one that fits how you use When and What.</p>
        </div>
    </section>

    {{-- ── Pricing Plans ──────────────────────────────────────────── --}}
    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center g-5">

                {{-- Web Only --}}
                <div class="col-lg-5 col-md-6">
                    <h2 class="text-center mb-1">Web</h2>
                    <p class="text-center text-muted small mb-4">Access via the website</p>
                    <div class="d-flex flex-column gap-3">

                        <div class="pricing-card">
                            <div class="pricing-card-header">
                                <h3 class="pricing-plan-name">Monthly</h3>
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

                        <div class="pricing-card">
                            <div class="pricing-card-header">
                                <h3 class="pricing-plan-name">6 Months</h3>
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

                        <div class="pricing-card pricing-card-featured">
                            <div class="pricing-badge">Best value</div>
                            <div class="pricing-card-header">
                                <h3 class="pricing-plan-name">Annual</h3>
                                <div class="pricing-price">
                                    <span class="pricing-currency">$</span><span class="pricing-amount">15</span><span
                                        class="pricing-period">/yr</span>
                                </div>
                                <p class="pricing-description">Save $9 vs monthly — that's 3 months free.</p>
                            </div>
                            <button class="btn btn-cta w-100 btn-lg mt-auto" disabled>
                                Coming Soon
                            </button>
                        </div>

                    </div>
                </div>

                {{-- Web + Mobile --}}
                <div class="col-lg-5 col-md-6">
                    <h2 class="text-center mb-1">Web + Mobile</h2>
                    <p class="text-center text-muted small mb-4">Website access plus iOS &amp; Android apps</p>
                    <div class="d-flex flex-column gap-3">

                        <div class="pricing-card">
                            <div class="pricing-card-header">
                                <h3 class="pricing-plan-name">Monthly</h3>
                                <div class="pricing-price">
                                    <span class="pricing-currency">$</span><span class="pricing-amount">4</span><span
                                        class="pricing-period">/mo</span>
                                </div>
                                <p class="pricing-description">Pay as you go, cancel anytime.</p>
                            </div>
                            <button class="btn btn-outline-secondary w-100 btn-lg mt-auto" disabled>
                                Coming Soon
                            </button>
                        </div>

                        <div class="pricing-card">
                            <div class="pricing-card-header">
                                <h3 class="pricing-plan-name">6 Months</h3>
                                <div class="pricing-price">
                                    <span class="pricing-currency">$</span><span class="pricing-amount">18</span><span
                                        class="pricing-period">/6 mo</span>
                                </div>
                                <p class="pricing-description">Save $6 vs monthly — renews every six months.</p>
                            </div>
                            <button class="btn btn-outline-secondary w-100 btn-lg mt-auto" disabled>
                                Coming Soon
                            </button>
                        </div>

                        <div class="pricing-card pricing-card-featured">
                            <div class="pricing-badge">Best value</div>
                            <div class="pricing-card-header">
                                <h3 class="pricing-plan-name">Annual</h3>
                                <div class="pricing-price">
                                    <span class="pricing-currency">$</span><span class="pricing-amount">26</span><span
                                        class="pricing-period">/yr</span>
                                </div>
                                <p class="pricing-description">Save $22 vs monthly — over 5 months free.</p>
                            </div>
                            <button class="btn btn-cta w-100 btn-lg mt-auto" disabled>
                                Coming Soon
                            </button>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Fine print --}}
            <p class="text-center text-muted small mt-5">
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
                        <h5>What's the difference between Web and Web + Mobile?</h5>
                        <p>The Web plan gives you full access to When and What through your browser. Web + Mobile adds
                            native iOS and Android apps so you can check in, review your day, and add notes from your
                            phone.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>Can I switch plans or billing periods?</h5>
                        <p>Yes. You can switch between Web and Web + Mobile, or change your billing frequency, at any
                            time from your account settings. Any remaining credit is applied to your new plan.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>What happens if I cancel?</h5>
                        <p>You keep full access until the end of your current billing period. After that your account is
                            paused — your data is retained for 30 days so you can reactivate without losing anything.</p>
                    </div>

                    <div class="pricing-faq-item">
                        <h5>Is there a free trial?</h5>
                        <p>Yes! After signing up you will receive one month free. You'll have unlimited use and can
                            subscribe to any plan at any point during your trial.</p>
                    </div>

                    <div class="pricing-faq-item border-0 mb-0 pb-0">
                        <h5>Is my payment information secure?</h5>
                        <p>Yes. We never see or store your card details — payments are handled entirely by <a
                                href="https://stripe.com" target="_blank" rel="noopener">Stripe</a>, one of the most
                            trusted payment processors in the world.</p>
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

@extends('layouts.app')

@section('title', 'Privacy Policy')
@section('meta_description', 'Privacy Policy for When and What — how we collect, use, and protect your information.')

@section('content')
    <div class="container">
        <div class="legal-content">
            <h1>Privacy Policy</h1>
            <p class="effective-date">Effective date: {{ date('F j, Y') }}</p>

            <p>When and What, LLC ("we", "our", or "us") operates the When and What service, accessible at <a
                    href="https://whenandwhat.app">whenandwhat.app</a>. This page describes what information we collect, how
                we use it, and your rights regarding your data.</p>

            <h2>1. Information We Collect</h2>
            <p>We collect the following types of information when you use When and What:</p>
            <ul>
                <li><strong>Account information:</strong> Your email address and a display name when you create an account.
                </li>
                <li><strong>Billing information:</strong> If you subscribe, we collect the details necessary to process your
                    payment. Card details are handled entirely by Stripe and are never stored on our servers. We retain a
                    record of your subscription status and billing period.</li>
                <li><strong>Activity data from third-party services:</strong> When you connect Trakt, Strava, or
                    ListenBrainz, we import activity data from those services (watch history, workouts, listening history)
                    on your behalf, using the permissions you grant.</li>
                <li><strong>Check-in data:</strong> Location names, optional coordinates, and timestamps that you manually
                    submit when you check in to a place.</li>
                <li><strong>Usage data:</strong> Standard server logs including IP address, browser type, pages visited, and
                    timestamps, used for security and service improvement.</li>
            </ul>

            <h2>2. How We Use Your Information</h2>
            <p>We use your information solely to provide and improve the When and What service:</p>
            <ul>
                <li>To display your daily summaries and activity timelines.</li>
                <li>To sync data from connected third-party services.</li>
                <li>To maintain your account and authenticate you securely.</li>
                <li>To diagnose technical issues and improve service reliability.</li>
            </ul>
            <p>We do not sell your personal data. We do not use your data for advertising.</p>

            <h2>3. Third-Party Services</h2>
            <p>When and What integrates with the following third-party services. Each has its own privacy policy:</p>
            <ul>
                <li><strong>Trakt</strong> — <a href="https://trakt.tv/privacy" target="_blank"
                        rel="noopener">trakt.tv/privacy</a></li>
                <li><strong>Strava</strong> — <a href="https://www.strava.com/legal/privacy" target="_blank"
                        rel="noopener">strava.com/legal/privacy</a></li>
                <li><strong>ListenBrainz</strong> — <a href="https://metabrainz.org/privacy" target="_blank"
                        rel="noopener">metabrainz.org/privacy</a></li>
                <li><strong>Stripe</strong> — <a href="https://stripe.com/privacy" target="_blank"
                        rel="noopener">stripe.com/privacy</a> — used to process subscription payments. We do not store your
                    payment card details. Stripe may collect and process payment information in accordance with their own
                    privacy policy and applicable law.</li>
            </ul>
            <p>For activity integrations (Trakt, Strava, ListenBrainz), we only request the minimum permissions needed to
                read your activity data. We do not post, modify, or delete data on these platforms on your behalf.</p>

            <h2>4. Data Storage and Retention</h2>
            <p>Your data is stored on secure servers. We retain your data for as long as your account is active. If you
                delete your account, your personal data and imported activity data will be permanently deleted within 30
                days.</p>

            <h2>5. Data Sharing</h2>
            <p>We do not share your personal data with third parties except:</p>
            <ul>
                <li>As required by law or to respond to legal process.</li>
                <li>To protect the rights and safety of When and What, our users, or the public.</li>
                <li>With infrastructure providers (hosting, database) who process data on our behalf under appropriate data
                    processing agreements.</li>
            </ul>

            <h2>6. Security</h2>
            <p>We use industry-standard measures to protect your data, including encrypted connections (HTTPS), secure
                credential storage, and access controls. No system is completely secure, and we cannot guarantee absolute
                security.</p>

            <h2>7. Your Rights</h2>
            <p>Depending on your location, you may have rights to access, correct, delete, or export your personal data. To
                exercise any of these rights, please contact us at the address below.</p>

            <h2>8. Cookies</h2>
            <p>When and What uses cookies only for essential purposes: maintaining your login session and preventing
                cross-site request forgery. We do not use tracking or advertising cookies.</p>

            <h2>9. Children's Privacy</h2>
            <p>When and What is intended for users who are <strong>13 years of age or older</strong>. The service is not
                directed at children under 13, and we do not knowingly collect personal information from anyone under 13.
            </p>
            <p>If you are a parent or guardian and believe your child under 13 has provided us with personal information,
                please contact us immediately. We will promptly delete that information from our records.</p>
            <p>Users between the ages of 13 and 18 should review these terms with a parent or guardian before using the
                service.</p>

            <h2>10. Changes to This Policy</h2>
            <p>We may update this policy from time to time. We will notify you of significant changes by posting a notice in
                the app or by email. Your continued use after changes take effect constitutes acceptance of the updated
                policy.</p>

            <h2>11. Contact</h2>
            <p>If you have questions about this Privacy Policy or your data, please contact us through <a
                    href="https://whenandwhat.app">whenandwhat.app</a>.</p>
        </div>
    </div>
@endsection

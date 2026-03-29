@extends('layouts.app')

@section('title', 'Terms of Service')
@section('meta_description', 'Terms of Service for When and What.')

@section('content')
    <div class="container">
        <div class="legal-content">
            <h1>Terms of Service</h1>
            <p class="effective-date">Effective date: {{ date('F j, Y') }}</p>

            <p>These Terms of Service ("Terms") govern your access to and use of When and What, operated at <a
                    href="https://whenandwhat.app">whenandwhat.app</a>. By using the service you agree to these Terms.</p>

            <h2>1. Eligibility</h2>
            <p>You must be at least <strong>13 years of age</strong> to use When and What. By creating an account or using
                the service, you represent and warrant that you are 13 or older. If you are between the ages of 13 and 18,
                you represent that your parent or legal guardian has reviewed and agreed to these Terms on your behalf.</p>
            <p>We do not knowingly allow children under 13 to create accounts. If we learn that an account belongs to a
                child under 13, we will terminate that account and delete the associated data promptly.</p>

            <h2>2. Use of the Service</h2>
            <p>When and What is a personal activity tracking service. You may use it for your own personal, non-commercial
                purposes. You agree not to:</p>
            <ul>
                <li>Use the service for any unlawful purpose.</li>
                <li>Attempt to gain unauthorized access to the service or its infrastructure.</li>
                <li>Interfere with or disrupt the operation of the service.</li>
                <li>Scrape, copy, or redistribute the service or its content without permission.</li>
            </ul>

            <h2>3. Subscriptions and Billing</h2>
            <p>Access to When and What requires a paid subscription. We offer the following plans:</p>
            <ul>
                <li><strong>Monthly:</strong> $2.00 per month, billed every 30 days.</li>
                <li><strong>Annual:</strong> $15.00 per year, billed once every 12 months.</li>
            </ul>
            <p><strong>Auto-renewal.</strong> Subscriptions renew automatically at the end of each billing period using the
                payment method on file. You will not receive a separate notice before each renewal. You can cancel at any
                time from your account settings to prevent the next renewal.</p>
            <p><strong>Cancellation.</strong> If you cancel, you retain full access to the service until the end of your
                current paid period. We do not issue prorated refunds for unused time.</p>
            <p><strong>Refunds.</strong> If you experience a technical issue that we are unable to resolve within 7 days of
                your initial subscription, contact us and we will work to make it right, which may include a refund at our
                discretion. Outside of this window, subscription payments are non-refundable.</p>
            <p><strong>Price changes.</strong> We reserve the right to change subscription pricing. We will give you at
                least 30 days' advance notice of any price increase, and the new price will take effect at your next renewal
                after that notice period.</p>
            <p><strong>Payment processing.</strong> Payments are processed by Stripe. By subscribing you agree to <a
                    href="https://stripe.com/legal" target="_blank" rel="noopener">Stripe's terms of service</a>. We do not
                store your full payment card details.</p>

            <h2>4. Accounts</h2>
            <p>You are responsible for maintaining the confidentiality of your account credentials. You are responsible for
                all activity that occurs under your account. Notify us immediately if you suspect unauthorized use.</p>

            <h2>5. Third-Party Integrations</h2>
            <p>When and What connects to third-party services (Trakt, Strava, ListenBrainz) using OAuth. Your use of those
                services is governed by their own terms. We are not responsible for the availability or accuracy of data
                provided by third-party services.</p>

            <h2>6. User Content</h2>
            <p>You retain ownership of the check-in data and other content you submit to When and What. By submitting
                content, you grant us a limited license to store and display it to you as part of the service. We do not
                claim ownership of your content and will not use it for any purpose other than providing the service to you.
            </p>

            <h2>7. Service Availability</h2>
            <p>We aim to keep When and What available at all times but do not guarantee uninterrupted access. The service
                may be unavailable due to maintenance, outages, or circumstances beyond our control.</p>

            <h2>8. Disclaimer of Warranties</h2>
            <p>The service is provided "as is" and "as available" without warranties of any kind, express or implied,
                including but not limited to warranties of merchantability, fitness for a particular purpose, and
                non-infringement.</p>

            <h2>9. Limitation of Liability</h2>
            <p>To the fullest extent permitted by law, When and What and its operators shall not be liable for any indirect,
                incidental, special, consequential, or punitive damages arising from your use of or inability to use the
                service.</p>

            <h2>10. Termination</h2>
            <p>You may stop using the service and delete your account at any time. We reserve the right to suspend or
                terminate accounts that violate these Terms.</p>

            <h2>11. Changes to These Terms</h2>
            <p>We may update these Terms from time to time. We will notify you of material changes by posting a notice in
                the app or by email. Continued use after changes take effect constitutes acceptance.</p>

            <h2>12. Governing Law</h2>
            <p>These Terms are governed by applicable law. Any disputes shall be resolved in the jurisdiction where the
                service operator is located.</p>

            <h2>13. Contact</h2>
            <p>Questions about these Terms? <a href="/contact">Contact us</a></p>
        </div>
    </div>
@endsection

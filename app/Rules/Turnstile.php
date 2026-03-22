<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Turnstile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // 1. Call the Cloudflare siteverify endpoint
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret'   => config('services.turnstile.secret'),
            'response' => $value, // The token from the form
            'remoteip' => request()->ip(), // Optional: for enhanced detection
        ]);

        // 2. Check the response for success status
        if (!$response->successful() || !data_get($response->json(), 'success')) {
            // Check for specific error codes for better feedback (e.g., 'challenge_expired')
            $errorCodes = data_get($response->json(), 'error-codes', []);

            Log::info('Turnstile verification failed.', [
                'errors' => $errorCodes,
                'ip' => request()->ip(),
            ]);

            $fail('Human verification failed. Please refresh and try again.');
        }
    }
}

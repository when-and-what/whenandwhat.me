<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(ContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Mail::send(new Contact(...$validated));

        return redirect()
            ->route('contact')
            ->with('success', "Thanks for reaching out! We'll get back to you soon.");
    }
}

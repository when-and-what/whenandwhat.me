@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', 'Get in touch with the When and What team.')

@section('content')

    <section class="hero" style="padding: 4rem 0 3rem;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-7">
                    <h1 style="font-size: clamp(1.75rem, 4vw, 2.75rem);">Get in touch</h1>
                    <p class="lead mt-2 mb-0" style="max-width: 100%;">
                        Have a question, found a bug, or just want to say hi? We'd love to hear from you.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center gap-2 mb-4" role="alert">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-600">Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Your name"
                                autocomplete="name"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-600">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label fw-600">Message</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="What's on your mind?"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-cta btn-lg w-100">
                            Send Message <i class="fa-solid fa-paper-plane ms-1"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
    .fw-600 { font-weight: 600; }

    .form-control {
        border-color: var(--ww-border);
        border-radius: 8px;
        padding: 0.6rem 0.85rem;
        font-size: 0.95rem;
        color: var(--ww-dark);
    }

    .form-control:focus {
        border-color: var(--ww-accent);
        box-shadow: 0 0 0 0.2rem rgba(13, 148, 136, 0.2);
    }

    .form-control::placeholder { color: #94a3b8; }

    .form-label {
        font-size: 0.9rem;
        color: var(--ww-dark);
        margin-bottom: 0.4rem;
    }

    .alert-success {
        background: #f0fdfa;
        border-color: #99f6e4;
        color: var(--ww-accent-dark);
        border-radius: 8px;
        font-size: 0.9rem;
    }
</style>
@endpush

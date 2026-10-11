@props(['src', 'caption'])

{{-- Renders the screenshot if it exists in public/, otherwise a labelled placeholder. --}}
<figure class="automation-shot">
    @if (file_exists(public_path($src)))
        <img src="{{ asset($src) }}" alt="{{ $caption }}" loading="lazy">
    @else
        <div class="screenshot-placeholder">Screenshot coming soon</div>
    @endif
    <figcaption>{{ $caption }}</figcaption>
</figure>

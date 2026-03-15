<div class="accordion" id="faqAccordion">
    @foreach($items as $index => $item)
        <div class="accordion-item border-0 border-bottom">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }} bg-white fw-semibold"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq-{{ $index }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="faq-{{ $index }}">
                    {{ $item['question'] }}
                </button>
            </h2>
            <div id="faq-{{ $index }}"
                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted" style="font-size: 0.9rem; line-height: 1.7;">
                    {{ $item['answer'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>

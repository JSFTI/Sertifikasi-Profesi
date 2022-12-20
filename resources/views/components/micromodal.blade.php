<div class="modal" id="{{ $id }}" aria-hidden="true">
    <div
        class="modal-overlay" tabindex="-1"
        @@mousedown="$event.target.classList.contains('modal-overlay') && MicroModal.close(`{{$id}}`)"
    >
        <div class="modal-content" role="dialog" aria-modal="true">
            <h2 class="modal-title text-2xl font-600 relative pr-8">
                {{ $title ?? '&nbsp;' }}
                <button class="absolute top-0 right-0" data-micromodal-close>
                    <div class="i-mdi:close"></div>
                </button>
            </h2>
            <div class="modal-body mt-5">
                {{ $slot }}                
            </div>
            <footer>
                {{ $footer ?? '' }}
            </footer>
        </div>
    </div>
</div>
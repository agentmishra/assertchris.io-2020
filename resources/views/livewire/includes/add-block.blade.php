<div class="flex w-full pl-6">
    <div class="flex flex-row w-full h-2 transition-height items-center justify-center bg-gray-100 rounded-sm overflow-hidden" data-dwell-classes="h-8 group">
        <button wire:click="addBlock({{ $position }}, 'heading', 1)" class="flex w-4 h-4 mr-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity">
            @icon('solid.h1')
        </button>
        <button wire:click="addBlock({{ $position }}, 'heading', 2)" class="flex w-4 h-4 mr-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity">
            @icon('solid.h2')
        </button>
        <button wire:click="addBlock({{ $position }}, 'heading', 3)" class="flex w-4 h-4 mr-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity">
            @icon('solid.h3')
        </button>
        <button wire:click="addBlock({{ $position }}, 'text')" class="flex w-4 h-4 mr-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity">
            @icon('solid.paragraph')
        </button>
        <button wire:click="addBlock({{ $position }}, 'image')" class="flex w-4 h-4 mr-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity">
            @icon('solid.camera')
        </button>
        <button wire:click="addBlock({{ $position }}, 'note')" class="flex w-4 h-4 mr-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity">
            @icon('solid.sticky-note')
        </button>
        <button wire:click="addBlock({{ $position }}, 'code')" class="flex w-4 h-4 mr-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity">
            @icon('solid.code')
        </button>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('mouseenter', function(e) {
            var target = e.target

            if (target.matches('[data-dwell-classes]')) {
                var existing = target.getAttribute('data-dwell-timer')
                var classes = target.getAttribute('data-dwell-classes').split(' ')

                if (existing) {
                    clearTimeout(existing)
                }

                var created = setTimeout(function() {
                    target.classList.add(...classes)
                }, 250)

                target.setAttribute('data-dwell-timer', created)
            }
        }, true)

        document.addEventListener('mouseleave', function(e) {
            var target = e.target

            if (target.matches('[data-dwell-classes]')) {
                var existing = target.getAttribute('data-dwell-timer')
                var classes = target.getAttribute('data-dwell-classes').split(' ')

                if (existing) {
                    clearTimeout(existing)
                }

                target.classList.remove(...classes)
            }
        }, true)
    </script>
@endpush

<div class="flex flex-col lg:flex-row w-full items-start justify-start">
    <div class="flex flex-col w-full lg:w-2/3 mb-2 lg:pr-8 -ml-6">
        @include('livewire.includes.add-block', [ 'position' => 0 ])
        @foreach ($blocks as $block)
            <div class="flex flex-row items-center justify-center w-full relative group">
                <div class="flex flex-col mr-2 my-4">
                    @include('livewire.includes.actions')
                </div>
                @if ($block->type === 'heading')
                    @include('livewire.includes.heading-block')
                @endif
                @if ($block->type === 'text')
                    @include('livewire.includes.text-block')
                @endif
                @if ($block->type === 'image')
                    @include('livewire.includes.image-block')
                @endif
                @if ($block->type === 'note')
                    @include('livewire.includes.note-block')
                @endif
                @if ($block->type === 'code')
                    @include('livewire.includes.code-block')
                @endif
            </div>
            @include('livewire.includes.add-block', [ 'position' => $block->position + 1 ])
        @endforeach
    </div>
    @include('livewire.includes.meta')
</div>

@push('scripts')
    <script type="text/javascript">
        function resizeElement(element) {
            var offset = element.offsetHeight - element.clientHeight

            element.style.height = 'auto'
            element.style.height = element.scrollHeight + offset + 'px'
        }

        document.addEventListener('input', function(e) {
            if (e.target.matches('[data-auto-resize]')) {
                resizeElement(e.target)
            }
        }, true)

        document.querySelectorAll('[data-auto-resize]').forEach(function(element) {
            resizeElement(element)
        })

        document.addEventListener('livewire:load', function(event) {
            window.livewire.afterDomUpdate(() => {
                document.querySelectorAll('[data-auto-resize]').forEach(function(element) {
                    resizeElement(element)
                })
            })
        }, true)
    </script>
@endpush

<div class="flex flex-col w-full my-4">
    @if ($this->block->image_path)
        <img
            src="https://assertchris.fra1.cdn.digitaloceanspaces.com/{{ $this->block->image_path }}"
            class="
                flex h-auto mx-auto
                @if ($this->block->image_arrangement == 'full')
                    w-full
                @else
                    w-3/4
                @endif
            "
        />
    @endif
    <textarea
        name="image_content_{{ $this->block->id }}"
        class="flex w-full border-l-4 border-gray-400 pl-2 focus:bg-gray-100 outline-none"
        wire:change="updateBlock('image_content', $event.target.value)"
        rows="1"
    >{{ $this->block->image_content }}</textarea>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('change', function(e) {
            var target = e.target

            if (target.matches("[type='file']")) {
                var blockId = target.getAttribute('data-block-id')

                var name = target.files[0].name
                var type = target.files[0].type
                var size = target.files[0].size

                fileToBase64(target.files[0]).then(function(data) {
                    window.livewire.emit('onUploadImage', blockId, name, type, size, data)
                })
            }
        }, true)
    </script>
@endpush

<textarea
    name="note_content_{{ $block->id }}"
    class="flex w-full m-2 border-l-4 border-gray-400 pl-2 focus:bg-gray-100 outline-none font-mono"
    wire:change="updateBlockField({{ $block->id }}, 'code_content', $event.target.value)"
    data-auto-resize
    data-code-tab
>{{ $block->code_content }}</textarea>

@push('scripts')
    <script>
        document.addEventListener('keydown', function(e) {
            if (e.target.matches('[data-code-tab]')) {
                if (e.key == 'Tab') {
                    e.preventDefault()
                    document.execCommand('insertText', false, ' '.repeat(4))
                }
            }
        }, true)
    </script>
@endpush

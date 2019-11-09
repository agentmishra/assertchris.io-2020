<textarea
    name="note_content_{{ $block->id }}"
    class="flex w-full m-2 border-l-4 border-gray-400 pl-2 focus:bg-gray-100 outline-none"
    wire:change="updateBlockField({{ $block->id }}, 'note_content', $event.target.value)"
    data-auto-resize
>{{ $block->note_content }}</textarea>

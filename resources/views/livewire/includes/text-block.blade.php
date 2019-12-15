<textarea
    type="text"
    name="text_content_{{ $block->id }}"
    class="flex w-full my-4 focus:bg-gray-100 outline-none"
    wire:change="updateBlockField({{ $block->id }}, 'text_content', $event.target.value)"
    data-auto-resize
    rows="1"
>{{ $block->text_content }}</textarea>

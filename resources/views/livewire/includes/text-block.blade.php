<textarea
    type="text"
    name="text_content_{{ $block->id }}"
    class="flex w-full m-2 focus:bg-gray-100 outline-none"
    wire:change="updateBlockField({{ $block->id }}, 'text_content', $event.target.value)"
    data-auto-resize="{{ $block->id }}"
>{{ $block->text_content }}</textarea>

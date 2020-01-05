<textarea
    type="text"
    name="text_content_{{ $this->block->id }}"
    class="flex w-full my-4 focus:bg-gray-100 outline-none"
    wire:change="updateBlock('text_content', $event.target.value)"
    data-auto-resize="new"
    rows="1"
>{{ $this->block->text_content }}</textarea>

<textarea
    name="note_content_{{ $this->block->id }}"
    class="flex w-full my-4 border-l-4 border-gray-400 pl-2 focus:bg-gray-100 outline-none"
    wire:change="updateBlock('note_content', $event.target.value)"
    data-auto-resize="new"
    rows="1"
>{{ $this->block->note_content }}</textarea>

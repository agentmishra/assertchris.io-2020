<textarea
    name="note_content_{{ $this->block->id }}"
    class="flex w-full my-4 border-l-4 border-gray-400 pl-2 focus:bg-gray-100 outline-none font-mono"
    wire:change="updateBlock('code_content', $event.target.value)"
    data-auto-resize="new"
    data-code-tab
    rows="1"
>{{ $this->block->code_content }}</textarea>

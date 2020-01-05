<input
    name="heading_content_{{ $this->block->id }}"
    class="
        flex w-full font-semibold my-4 focus:bg-gray-100 outline-none
        @if ($this->block->heading_level == 1)
            text-2xl
        @endif
        @if ($this->block->heading_level == 2)
            text-xl
        @endif
        @if ($this->block->heading_level == 3)
            text-lg
        @endif
    "
    value="{{ $this->block->heading_content }}"
    wire:change="updateBlock('heading_content', $event.target.value)"
/>

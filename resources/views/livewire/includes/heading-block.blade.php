<input
    name="heading_content_{{ $block->id }}"
    class="
        flex w-full font-semibold m-2 focus:bg-gray-100 outline-none
        @if ($block->heading_level == 1)
            text-2xl
        @endif
        @if ($block->heading_level == 2)
            text-xl
        @endif
        @if ($block->heading_level == 3)
            text-lg
        @endif
    "
    value="{{ $block->heading_content }}"
    wire:change="updateBlockField({{ $block->id }}, 'heading_content', $event.target.value)"
/>

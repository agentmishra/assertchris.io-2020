<button class="flex w-4 h-4 mb-2 text-red-400 opacity-0 group-hover:opacity-100 transition-opacity" wire:click="removeBlock({{ $block->id }})">
    @icon('solid.trash-alt')
</button>
@if ($block->type == 'image')
    <div class="relative flex w-4 h-4 mb-2 overflow-hidden opacity-0 group-hover:opacity-100 cursor-pointer text-blue-400">
        <div class="absolute top-0 left-0 w-4 h-4 pointer-events-none">
            @icon('solid.file-upload')
        </div>
        <input
            type="file"
            class="absolute top-0 left-0 w-4 h-4 opacity-0"
            data-block-id="{{ $block->id }}"
        />
    </div>
    @if ($block->image_arrangement == 'centered')
        <button
            key="image_expand_{{ $block->id }}"
            class="flex w-4 h-4 mb-2 opacity-0 group-hover:opacity-100 text-blue-400 cursor-pointer"
            wire:click="updateBlockField({{ $block->id }}, 'image_arrangement', 'full')"
        >
            @icon('solid.expand')
        </button>
    @endif
    @if ($block->image_arrangement == 'full')
        <button
            key="image_collapse_{{ $block->id }}"
            class="flex w-4 h-4 mb-2 opacity-0 group-hover:opacity-100 text-blue-400 cursor-pointer"
            wire:click="updateBlockField({{ $block->id }}, 'image_arrangement', 'centered')"
        >
            @icon('solid.compress-arrows-alt')
        </button>
    @endif
@endif

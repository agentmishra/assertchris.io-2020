<button class="flex w-4 h-4 mb-2 text-red-500 opacity-0 group-hover:opacity-100 transition-opacity" wire:click="$emit('onRemoveBlock', {{ $this->block->id }})">
    @icon('solid.trash-alt')
</button>
<button class="flex w-4 h-4 mb-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" wire:click="$emit('onMoveBlockUp', {{ $this->block->id }})">
    @icon('solid.arrow-up')
</button>
<button class="flex w-4 h-4 mb-2 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" wire:click="$emit('onMoveBlockDown', {{ $this->block->id }})">
    @icon('solid.arrow-down')
</button>
@if ($this->block->type == 'image')
    <div class="relative flex w-4 h-4 mb-2 overflow-hidden opacity-0 group-hover:opacity-100 cursor-pointer text-blue-500">
        <div class="absolute top-0 left-0 w-4 h-4 pointer-events-none">
            @icon('solid.file-upload')
        </div>
        <input
            type="file"
            class="absolute top-0 left-0 w-4 h-4 opacity-0"
            data-block-id="{{ $this->block->id }}"
        />
    </div>
    @if ($this->block->image_arrangement == 'centered')
        <button
            key="image_expand_{{ $this->block->id }}"
            class="flex w-4 h-4 mb-2 opacity-0 group-hover:opacity-100 text-blue-500 cursor-pointer"
            wire:click="updateBlock('image_arrangement', 'full')"
        >
            @icon('solid.expand')
        </button>
    @endif
    @if ($this->block->image_arrangement == 'full')
        <button
            key="image_collapse_{{ $this->block->id }}"
            class="flex w-4 h-4 opacity-0 group-hover:opacity-100 text-blue-500 cursor-pointer"
            wire:click="updateBlock('image_arrangement', 'centered')"
        >
            @icon('solid.compress-arrows-alt')
        </button>
    @endif
@endif

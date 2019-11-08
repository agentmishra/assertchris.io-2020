<div class="flex flex-row w-full group p-2 bg-gray-100 rounded-sm">
    <button wire:click="addBlock({{ $position }}, 'heading', 1)" class="flex w-4 h-4 mr-2 text-gray-500 opacity-0 group-hover:opacity-100">
        @icon('solid.h1')
    </button>
    <button wire:click="addBlock({{ $position }}, 'heading', 2)" class="flex w-4 h-4 mr-2 text-gray-500 opacity-0 group-hover:opacity-100">
        @icon('solid.h2')
    </button>
    <button wire:click="addBlock({{ $position }}, 'heading', 3)" class="flex w-4 h-4 mr-2 text-gray-500 opacity-0 group-hover:opacity-100">
        @icon('solid.h3')
    </button>
    <button wire:click="addBlock({{ $position }}, 'text')" class="flex w-4 h-4 mr-2 text-gray-500 opacity-0 group-hover:opacity-100">
        @icon('solid.paragraph')
    </button>
</div>

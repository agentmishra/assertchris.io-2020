<div class="flex flex-col w-full">
    <label class="flex flex-col w-full">
        <span class="flex w-full">title</span>
        <input
            type="text"
            name="title"
            class="flex w-full"
            value="{{ $post->title }}"
            wire:change="updatePostField('title', $event.target.value)"
        />
    </label>
    <label class="flex flex-col w-full">
        <span class="flex w-full">slug</span>
        <input
            type="text"
            name="slug"
            class="flex w-full"
            value="{{ $post->slug }}"
            wire:change="updatePostField('slug', $event.target.value)"
        />
    </label>
    <label class="flex flex-col w-full">
        <span class="flex w-full">intro</span>
        <textarea
            name="intro"
            class="flex w-full h-20"
            wire:change="updatePostField('intro', $event.target.value)"
        >{{ $post->intro }}</textarea>
    </label>
    @foreach ($blocks as $block)
        @if ($loop->first)
            <div class="flex flex-row w-full">
                <button wire:click="addBlockAt({{ $block->order }}, 'heading', 1)" class="flex py-1 px-2">heading 1</button>
                <button wire:click="addBlockAt({{ $block->order }}, 'heading', 2)" class="flex py-1 px-2">heading 2</button>
                <button wire:click="addBlockAt({{ $block->order }}, 'heading', 3)" class="flex py-1 px-2">heading 3</button>
                <button wire:click="addBlockAt({{ $block->order }}, 'text')" class="flex py-1 px-2">text</button>
            </div>
        @endif
        <div class="flex w-full group relative">
            <button class="hidden group-hover:flex absolute top-0 right-0 p-4" wire:click="removeBlock({{ $block->id }})">
                ❌
            </button>
            @if ($block->type === 'heading')
                <input
                    type="text"
                    name="heading_content_{{ $block->id }}"
                    class="flex w-full text-3xl font-semibold mb-4"
                    value="{{ $block->heading_content }}"
                    wire:change="updateBlockField({{ $block->id }}, 'heading_content', $event.target.value)"
                />
            @endif
            @if ($block->type === 'text')
                <textarea
                    type="text"
                    name="text_content_{{ $block->id }}"
                    class="flex w-full"
                    wire:change="updateBlockField({{ $block->id }}, 'text_content', $event.target.value)"
                >{{ $block->text_content }}</textarea>
            @endif
        </div>
        <div class="flex flex-row w-full">
            <button wire:click="addBlockAt({{ $block->order + 1 }}, 'heading', 1)" class="flex py-1 px-2">heading 1</button>
            <button wire:click="addBlockAt({{ $block->order + 1 }}, 'heading', 2)" class="flex py-1 px-2">heading 2</button>
            <button wire:click="addBlockAt({{ $block->order + 1 }}, 'heading', 3)" class="flex py-1 px-2">heading 3</button>
            <button wire:click="addBlockAt({{ $block->order + 1 }}, 'text')" class="flex py-1 px-2">text</button>
        </div>
    @endforeach
    <button class="flex">save</button>
</div>

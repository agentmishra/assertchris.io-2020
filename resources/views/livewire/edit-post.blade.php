<div class="flex flex-row w-full items-start justify-start">
    <div class="flex flex-col w-full md:w-2/3 mb-2 pr-4">
        @foreach ($blocks as $block)
            @if ($loop->first)
                @include('livewire.includes.add-block', [ 'position' => $block->position ])
            @endif
            <div class="flex flex-row items-center justify-center w-full group relative">
                <button class="flex w-4 h-4 mr-2 text-gray-400 opacity-0 group-hover:opacity-100" wire:click="removeBlock({{ $block->id }})">
                    @icon('solid.trash-alt')
                </button>
                @if ($block->type === 'heading')
                    <input
                        type="text"
                        name="heading_content_{{ $block->id }}"
                        class="
                            flex w-full font-semibold border-2 border-white group-hover:border-gray-100 p-2 rounded-sm
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
                @endif
                @if ($block->type === 'text')
                    <textarea
                        type="text"
                        name="text_content_{{ $block->id }}"
                        class="flex w-full border-2 border-white group-hover:border-gray-100 p-2 rounded-sm"
                        wire:change="updateBlockField({{ $block->id }}, 'text_content', $event.target.value)"
                    >{{ $block->text_content }}</textarea>
                @endif
            </div>
            @include('livewire.includes.add-block', [ 'position' => $block->position + 1 ])
        @endforeach
    </div>
    <details class="flex flex-col w-full md:w-1/3 mb-2">
        <summary>Meta data</summary>
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
    </details>
</div>

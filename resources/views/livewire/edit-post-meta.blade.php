<details class="flex flex-col w-full relative lg:sticky lg:top-0 lg:w-1/3 mb-2 group" open wire:ignore.self>
    <summary class="block mb-4 outline-none cursor-pointer">
        <div class="flex flex-row items-center justify-center px-2 h-8 align-middle bg-gray-100 rounded-sm outline-none text-xs text-gray-500">
            meta
        </div>
    </summary>
    <label class="flex flex-col w-full mb-4">
        <span class="flex w-full text-sm text-gray-500">title</span>
        <input
            type="text"
            name="title"
            class="flex w-full focus:bg-gray-100 outline-none"
            value="{{ $this->post->title }}"
            wire:change="updateField('title', $event.target.value)"
        />
    </label>
    <label class="flex flex-col w-full mb-4">
        <span class="flex w-full text-sm text-gray-500">slug</span>
        <input
            type="text"
            name="slug"
            class="flex w-full focus:bg-gray-100 outline-none"
            value="{{ $this->post->slug }}"
            wire:change="updateField('slug', $event.target.value)"
        />
    </label>
    <label class="flex flex-col w-full mb-4">
        <span class="flex w-full text-sm text-gray-500">published at</span>
        <input
            type="text"
            name="slug"
            class="flex w-full focus:bg-gray-100 outline-none"
            value="{{ $this->post->published_at }}"
            wire:change="updateField('published_at', $event.target.value)"
        />
    </label>
    <label class="flex flex-col w-full mb-4">
        <span class="flex w-full text-sm text-gray-500">intro</span>
        <textarea
            name="intro"
            class="flex w-full focus:bg-gray-100 outline-none"
            wire:change="updateField('intro', $event.target.value)"
            data-auto-resize="always"
        >{{ $this->post->intro }}</textarea>
    </label>
    <div class="flex flex-col w-full text-sm text-gray-700">
        <label class="flex flex-row w-full mb-1">
            Created <span class="font-semibold ml-1">{{ $this->post->created_at->format('j F Y, g:ia') }}</span>
        </label>
        <label class="flex flex-row w-full mb-1">
            Updated <span class="font-semibold ml-1">{{ $updated_at ?? $this->post->updated_at->format('j F Y, g:ia') }}</span>
        </label>
        <label wire:loading.class="opacity-100" class="flex w-4 h-4 mb-1 opacity-0 transition-opacity">
            @icon('solid.save')
        </label>
    </div>
</details>

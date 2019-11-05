<div class="flex flex-col w-full">
    <label class="flex flex-col w-full">
        <span class="flex w-full">title</span>
        <input
            type="text"
            name="title"
            class="flex w-full"
            value="{{ $post->title }}"
            wire:change="updateField('title', $event.target.value)"
        />
    </label>
    <label class="flex flex-col w-full">
        <span class="flex w-full">slug</span>
        <input
            type="text"
            name="slug"
            class="flex w-full"
            value="{{ $post->slug }}"
            wire:change="updateField('slug', $event.target.value)"
        />
    </label>
    <label class="flex flex-col w-full">
        <span class="flex w-full">intro</span>
        <textarea
            name="intro"
            class="flex w-full h-20"
            wire:change="updateField('intro', $event.target.value)"
        >{{ $post->intro }}</textarea>
    </label>
    <button class="flex">save</button>
</div>

<div class="flex flex-row items-center justify-center w-full relative group">
    <div class="flex flex-col mr-2 my-4">
        @include('livewire.includes.actions')
    </div>
    @if ($this->block->type === 'heading')
        @include('livewire.includes.heading-block')
    @endif
    @if ($this->block->type === 'text')
        @include('livewire.includes.text-block')
    @endif
    @if ($this->block->type === 'image')
        @include('livewire.includes.image-block')
    @endif
    @if ($this->block->type === 'note')
        @include('livewire.includes.note-block')
    @endif
    @if ($this->block->type === 'code')
        @include('livewire.includes.code-block')
    @endif
</div>

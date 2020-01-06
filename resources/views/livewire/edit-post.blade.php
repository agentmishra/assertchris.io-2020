<div class="flex flex-col w-full pb-32">
    @livewire('upload-post-block-image')
    <div class="my-8">
        <h1 class="text-2xl font-semibold">
            Edit Post:
            <span class="font-normal">{{ $this->post->title }}</span>
        </h1>
        <a href="{{ route('admin.posts.view-posts') }}" class="text-blue-500 underline">view posts</a>
    </div>
    <div class="flex flex-col lg:flex-row w-full items-start justify-start">
        <div class="flex flex-col w-full lg:w-2/3 mb-2 lg:pr-8 -ml-6">
            @include('livewire.includes.add-block', ['position' => 0])
            @foreach ($this->post->blocks()->orderBy('position', 'asc')->get() as $block)
                @livewire('edit-post-block', $block, key('block' . $block->toJson()))
                @include('livewire.includes.add-block', ['position' => $block->position + 1])
            @endforeach
        </div>
        @livewire('edit-post-meta', $this->post)
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        function resizeElement(element) {
            var offset = element.offsetHeight - element.clientHeight

            element.style.height = 'auto'
            element.style.height = element.scrollHeight + offset + 'px'

            if (element.getAttribute('data-auto-resize') !== 'always') {
                element.setAttribute('data-auto-resize', '')
            }
        }

        document.addEventListener('input', function(e) {
            if (e.target.matches('[data-auto-resize]')) {
                resizeElement(e.target)
            }
        }, true)

        window.addEventListener('resize', function(e) {
            document.querySelectorAll('[data-auto-resize]').forEach(function(element) {
                resizeElement(element)
            })
        })

        document.querySelectorAll('[data-auto-resize]').forEach(function(element) {
            resizeElement(element)
        })

        document.addEventListener('livewire:load', function(e) {
            window.livewire.afterDomUpdate(() => {
                document.querySelectorAll("[data-auto-resize='new'], [data-auto-resize='always']").forEach(function(element) {
                    resizeElement(element)
                })
            })
        }, true)
    </script>
@endpush

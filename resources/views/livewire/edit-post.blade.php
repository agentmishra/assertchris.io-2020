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
        // RESIZE ELEMENTS

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

        // ADD BLOCKS

        document.addEventListener('mouseenter', function(e) {
            var target = e.target

            if (target.matches('[data-dwell-classes]')) {
                var existing = target.getAttribute('data-dwell-timer')
                var classes = target.getAttribute('data-dwell-classes').split(' ')

                if (existing) {
                    clearTimeout(existing)
                }

                var created = setTimeout(function() {
                    target.classList.add(...classes)
                }, 250)

                target.setAttribute('data-dwell-timer', created)
            }
        }, true)

        document.addEventListener('mouseleave', function(e) {
            var target = e.target

            if (target.matches('[data-dwell-classes]')) {
                var existing = target.getAttribute('data-dwell-timer')
                var classes = target.getAttribute('data-dwell-classes').split(' ')

                if (existing) {
                    clearTimeout(existing)
                }

                target.classList.remove(...classes)
            }
        }, true)

        // CODE BLOCKS

        document.addEventListener('keydown', function(e) {
            if (e.target.matches('[data-code-tab]')) {
                if (e.key == 'Tab') {
                    e.preventDefault()
                    document.execCommand('insertText', false, ' '.repeat(4))
                }
            }
        }, true)

        // IMAGE BLOCKS

        document.addEventListener('change', function(e) {
            var target = e.target

            if (target.matches("[type='file']")) {
                var blockId = target.getAttribute('data-block-id')

                var name = target.files[0].name
                var type = target.files[0].type
                var size = target.files[0].size

                fileToBase64(target.files[0]).then(function(data) {
                    window.livewire.emit('onUploadImage', blockId, name, type, size, data)
                })
            }
        }, true)
    </script>
@endpush

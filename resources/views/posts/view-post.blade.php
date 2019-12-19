@extends('layout')

@section('content')
    <div class="flex flex-col w-full px-4 article">
        <h1 class="text-4xl">{{ $post->title }}</h1>
        <div class="text-sm text-gray-500">{{ $post->created_at->format('jS F Y') }}</div>
        @foreach ($post->blocks as $block)
            @if ($block->type == 'heading')
                @if ($block->heading_level == '1')
                    <h1 class="flex text-3xl">{{ $block->heading_content }}</h1>
                @endif
                @if ($block->heading_level == '2')
                    <h2 class="flex text-2xl">{{ $block->heading_content }}</h2>
                @endif
                @if ($block->heading_level == '3')
                    <h3 class="flex text-xl">{{ $block->heading_content }}</h3>
                @endif
            @endif
            @if ($block->type == 'text')
                {!! $block->text_content_markdown !!}
            @endif
            @if ($block->type == 'note')
                <blockquote class="flex w-full p-4 bg-gray-100">
                    {!! $block->note_content_markdown !!}
                </blockquote>
            @endif
            @if ($block->type == 'code')
                {!! $block->code_content_markdown !!}
            @endif
            @if ($block->type == 'image')
                <div class="flex flex-col w-full items-center justify-center mt-4">
                    @if($block->image_arrangement == 'full')
                        <img src="{{ $block->image_url }}" class="flex w-full mb-2" />
                    @endif
                    @if($block->image_arrangement == 'centered')
                        <img src="{{ $block->image_url }}" class="flex w-1/2 mb-2" />
                    @endif
                    <span class="flex text-sm text-gray-500">{{ $block->image_content }}</span>
                </div>
            @endif
        @endforeach
    </div>
    <div class="flex flex-col flex-grow items-center justify-center my-4 md:mt-16 md:mb-32 mx-4 md:mx-16 p-4 md:p-8 bg-gray-100 text-gray-900 text-lg">
        <h2 class="mb-2 text-3xl">Would you like me to keep you in the loop?</h2>
        <p class="mb-8 text-md">
            I write about all sorts of interesting code things, and I'd love to share them with you. I will only
            send you updates from the blog, and <strong class="font-medium">will not share your email address with anyone</strong>.
        </p>
        <form action="https://assertchris.us12.list-manage.com/subscribe/post?u=af7934ca8606594b204011bcc&amp;id=a8e81e08e9" method="post" target="_blank" class="flex flex-row flex-wrap w-full md:w-2/3">
            <input type="email" value="" name="EMAIL" class="flex w-full md:w-2/3 text-gray-900 border-0 border-b-2 text-base border-gray-500 focus:border-blue-300 outline-none px-3 py-2 mb-2 md:mb-0">
            <input type="text" name="b_af7934ca8606594b204011bcc_a8e81e08e9" tabindex="-1" value="" style="position: absolute; left: -5000px;" aria-hidden="true">
            <div class="flex w-full md:w-1/3 pl-0 md:pl-2">
                <input type="submit" value="Subscribe" name="subscribe" class="flex w-full px-4 py-2 bg-blue-400 text-white border-0 text-base items-center justify-center">
            </div>
        </form>
    </div>
@endsection

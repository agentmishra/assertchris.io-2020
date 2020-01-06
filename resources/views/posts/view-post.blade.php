@extends('layout')

@section('content')
    <div class="flex flex-col w-full px-4 article">
        <h1 class="text-4xl">{{ $post->title }}</h1>
        <div class="text-sm text-gray-500">{{ $post->published_at->format('jS F Y') }}</div>
        @foreach ($post->blocks as $block)
            @if ($block->type == 'heading')
                @if ($block->heading_level == '1')
                    <h1 class="flex text-3xl font-semibold" id="{{ $block->heading_id }}">{{ $block->heading_content }}</h1>
                @endif
                @if ($block->heading_level == '2')
                    <h2 class="flex text-2xl font-semibold" id="{{ $block->heading_id }}">{{ $block->heading_content }}</h2>
                @endif
                @if ($block->heading_level == '3')
                    <h3 class="flex text-xl font-semibold" id="{{ $block->heading_id }}">{{ $block->heading_content }}</h3>
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
    @include('includes.newsletter')
@endsection

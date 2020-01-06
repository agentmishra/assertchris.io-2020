@extends('admin.layout')

@section('content')
    <div class="my-8">
        <h1 class="text-2xl font-semibold">View Posts</h1>
        <a href="{{ route('admin.posts.create-post') }}" class="text-blue-500 underline">create post</a>
    </div>
    @foreach ($posts as $post)
        <div class="flex flex-row w-full items-center justify-start py-2">
            <span class="inline-flex w-4 h-4 pointer-events-none text-gray-500 mr-2">
                @if($post->published_at)
                    @icon('solid.eye')
                @else
                    @icon('solid.eye-slash')
                @endif
            </span>
            {{ $post->title }}
            <a href="{{ route('admin.posts.edit-post', $post) }}" class="text-blue-500 underline ml-2">edit</a>
        </div>
    @endforeach
    {{ $posts->links('vendor/pagination/simple-default') }}
@endsection

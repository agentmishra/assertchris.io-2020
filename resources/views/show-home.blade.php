@extends("layout")

@section("content")
    @foreach($posts as $post)
        <a
            href="{{ route('posts.view-post', $post) }}"
            class="
                flex flex-col mb-6 px-4 py-3
                @if($loop->odd)
                    bg-gray-100
                @endif
            "
        >
            <h2 class="text-2xl">{{ $post->title }}</h2>
            <h3 class="text-sm text-gray-500">{{ $post->created_at->format('jS F Y') }}</h3>
            <p class="my-4">{!! $post->intro_markdown !!}</p>
            <p class="text-blue-500 underline">Read this article</p>
        </a>
    @endforeach
    {{ $posts->links('vendor/pagination/simple-default') }}
@endsection

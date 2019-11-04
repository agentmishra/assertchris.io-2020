@extends('admin.layout')

@section('content')
    @foreach ($posts as $post)
        <div>
            {{ $post->title }}
        </div>
    @endforeach
    {{ $posts->links('vendor/pagination/simple-default') }}
@endsection

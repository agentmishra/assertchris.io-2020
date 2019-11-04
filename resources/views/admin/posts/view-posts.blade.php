@extends('admin.layout')

@section('content')
    <h1>View Posts</h1>
    @foreach ($posts as $post)
        <div>
            {{ $post->title }}
        </div>
    @endforeach
    {{ $posts->links('vendor/pagination/simple-default') }}
@endsection

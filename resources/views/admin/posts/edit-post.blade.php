@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-2">
        Edit Post:
        <span class="font-normal">{{ $post->title }}</span>
    </h1>
    @livewire('edit-post', $post->id)
@endsection

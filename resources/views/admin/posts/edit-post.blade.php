@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-semibold my-8">
        Edit Post:
        <span class="font-normal">{{ $post->title }}</span>
    </h1>
    @livewire('edit-post', $post->id)
@endsection

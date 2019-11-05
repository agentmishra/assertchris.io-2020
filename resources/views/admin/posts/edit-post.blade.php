@extends('admin.layout')

@section('content')
    <h1>Edit Post</h1>
    @livewire('edit-post', $post->id)
@endsection

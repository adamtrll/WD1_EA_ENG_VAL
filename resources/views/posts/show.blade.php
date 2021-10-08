@extends('layouts.main')

@section('content')
<h1 class="display-1">{{ $post->title }}</h1>
<p>{{ $post->author->name }} | {{ $post->topic->name }} | {{ $post->updated_at->diffForHumans() }}</p>
<p>{{ $post->description }}</p>
<div>
    {{ $post->content }}
</div>
@endsection

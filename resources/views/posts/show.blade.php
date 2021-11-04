@extends('layouts.main')

@section('content')
<h1 class="display-1">{{ $post->title }}</h1>
<p>
    <a href="{{ route('user.details', $post->author) }}">
        {{ $post->author->name }}
    </a>
    |
    <a href="{{ route('topic.details', $post->topic) }}">
        {{ $post->topic->name }}
    </a>
    |
    {{ $post->updated_at->diffForHumans() }}
</p>
<p>{{ $post->description }}</p>
<div>
    {!! $post->content !!}
</div>
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <p>
            {{ __('Responses') }}
        </p>
        @auth
            <form class="mb-5" action="{{ route('post.comment', $post) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">
                        {{ __('Comment') }}
                    </button>
                </div>
            </form>
        @endauth
        @foreach ($post->comments as $comment)
            @include('comments._item')
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.main')

@section('content')
<h1 class="display-1">{{ $post->title }}</h1>
<p>{{ $post->author->name }} | {{ $post->topic->name }} | {{ $post->updated_at->diffForHumans() }}</p>
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
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2">
                        <a href="#">
                            <img class="rounded-circle" src="{{ $comment->user->avatar }}" width="20" alt="{{ $comment->user->name }}" />
                            {{ $comment->user->name }}
                        </a>
                        |
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                    {{ $comment->message }}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

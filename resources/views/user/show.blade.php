@extends('layouts.main')

@section('content')
<div class="page page-user">
    <div class="row">
        <div class="col-lg-2">
            <img class="rounded-circle img-fluid" src="{{ $user->avatar }}" alt="{{ $user->name }}">
            <h1>{{ $user->name }}</h1>
            <div>
                <p>Posts: {{ $user->posts()->count() }}</p>
                <p>Comments: {{ $user->comments()->count() }}</p>
                <p>Following: {{ $user->followings()->count() }}</p>
                <p>Followers: {{ $user->followers()->count() }}</p>
            </div>
            @if (Auth::check() && Auth::user() != $user)
                @if (!Auth::user()->isFollowing($user))
                    <form action="{{ route('user.follow', $user) }}" method="POSt">
                        @csrf
                        <button class="btn btn-lg btn-primary">
                            {{ __('Follow') }}
                        </button>
                    </form>
                @else
                    <form action="{{ route('user.unfollow', $user) }}" method="POST">
                        @csrf
                        <button class="btn btn-lg btn-secondary">
                            {{ __('Unfollow') }}
                        </button>
                    </form>
                @endif
            @endif
        </div>
        <div class="col-lg-8">
            @forelse($posts as $post)
                @include('posts._item')
            @empty
                <div class="alert alert-warning">
                    {{ __('No posts to show') }}
                </div>
            @endforelse
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

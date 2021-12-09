<div class="post-item card mb-4">
    <div class="card-body d-flex">
        <img class="flex-shrink-0 flex-grow-0 image-cover" src="{{ $post->cover_image }}" width="150" height="150" alt="{{ $post->title }}">
        <div class="ms-3 d-flex flex-column flex-grow-1">
            <div class="d-flex">
                <h4 class="post-item-title">
                    <a href="{{ route('post.details', $post) }}">
                        {{ $post->title }}
                    </a>
                </h4>
                @can('update', $post)
                    <a class="ms-auto" href="{{ route('post.edit', $post) }}">
                        {{ __('edit') }}
                    </a>
                @endcan
            </div>
            <div class="post-item-meta mb-2">
                <a href="{{ route('user.details', $post->author) }}">
                    <img class="rounded-circle" src="{{ $post->author->avatar }}" width="20" alt="{{ $post->author->name }}" />
                    {{ $post->author->name }}
                </a>
                @if (Auth::check() && Auth::user() != $post->author)
                    @if (!Auth::user()->isFollowing($post->author))
                        <form action="{{ route('user.follow', $post->author) }}" method="POSt">
                            @csrf
                            <button class="btn btn-sm btn-primary">
                                {{ __('Follow') }}
                            </button>
                        </form>
                    @else
                        <form action="{{ route('user.unfollow', $post->author) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-secondary">
                                {{ __('Unfollow') }}
                            </button>
                        </form>
                    @endif
                @endif
                <span>{{ $post->created_at->diffForHumans() }}</span>
                <span>
                    {{ $post->minutes_to_read }} {{ __('minutes to read') }}
                </span>
            </div>
            <p class="post-item-description">{{ $post->description }}</p>
            <p class="mt-auto text-end mb-0">
                <a class="post-item-topic" href="{{ route('topic.details', $post->topic) }}">
                    {{ $post->topic->name }}
                </a>
            </p>
        </div>
    </div>
</div>

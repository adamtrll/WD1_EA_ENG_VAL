<div class="card mb-4">
    <div class="card-body d-flex">
        <img class="flex-shrink-0 flex-grow-0 image-cover" src="{{ $post->cover_image }}" width="150" height="150" alt="{{ $post->title }}">
        <div class="ms-3 d-flex flex-column flex-grow-1">
            <h4>
                <a href="{{ route('post.details', $post) }}">
                    {{ $post->title }}
                </a>
            </h4>
            <div class="mb-2">
                <a href="#">
                    <img class="rounded-circle" src="{{ $post->author->avatar }}" width="20" alt="{{ $post->author->name }}" />
                    {{ $post->author->name }}
                </a>
                |
                <span>{{ __('Replies') }}: {{ $post->comments()->count() }}</span>
                |
                <span>{{ $post->created_at->diffForHumans() }}</span>
                @can('update', $post)
                |
                <a href="{{ route('post.edit', $post) }}">
                    {{ __('edit') }}
                </a>
                @endcan
            </div>
            <p>{{ $post->description }}</p>
            <p class="mt-auto text-end mb-0">
                <a href="{{ route('topic.details', $post->topic) }}">
                    {{ $post->topic->name }}
                </a>
            </p>
        </div>
    </div>
</div>

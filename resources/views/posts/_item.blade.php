<div class="card mb-4">
    <div class="card-body d-flex">
        <img class="flex-shrink-0 flex-grow-0" src="https://via.placeholder.com/150" width="150" height="150" alt="{{ $post->title }}">
        <div class="ms-3 d-flex flex-column flex-grow-1">
            <h4>{{ $post->title }}</h4>
            <div class="mb-2">
                <a href="#">
                    <img class="rounded-circle" src="{{ $post->author->avatar }}" width="20" alt="{{ $post->author->name }}" />
                    {{ $post->author->name }}
                </a> | <span>{{ $post->created_at->diffForHumans() }}</span>
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

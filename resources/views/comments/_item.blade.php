<div class="comment">
    <div class="card mb-3" id="comment-{{ $comment->id }}">
        <div class="card-body">
            <div class="mb-2 d-flex">
                <a href="#">
                    <img class="rounded-circle" src="{{ $comment->user->avatar }}" width="20" alt="{{ $comment->user->name }}" />
                    {{ $comment->user->name }}
                </a>
                |
                {{ $comment->created_at->diffForHumans() }}
                @if (!$comment->is_reply)
                    <a class="ms-auto reply-toggle" href="#" onclick="toggleReplyFormVisbility(arguments[0])">
                        Reply
                    </a>
                @endif
            </div>
            {{ $comment->message }}
        </div>
    </div>
    <div class="replies ms-5">
        @if (!$comment->is_reply)
            <form action="{{ route('comment.reply', $comment) }}" class="mb-3" method="POST">
                @csrf
                <input type="hidden" value="{{ URL::current() }}#comment-{{ $comment->id }}" name="redirect_url">
                <div class="mb-3">
                    <textarea name="message" class="form-control"></textarea>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg mb-3">
                        {{ __('Reply') }}
                    </button>
                    <button class="btn btn-link" onclick="toggleReplyFormVisbility(arguments[0])">
                        {{ __('Cancel')}}
                    </button>
                </div>
            </form>
        @endif

        @foreach($comment->replies as $reply)
            @include('comments._item', ['comment' => $reply])
        @endforeach
    </div>
</div>

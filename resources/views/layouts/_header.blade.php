<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="#">Subscribe</a>
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                        <title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path>
                    </svg>
                </a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{ route('home') }}">
                    Bloggr.
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                @auth
                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-success">{{ __('Publish') }}</a>
                    <span class="ms-3">
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-link" type="submit">
                            {{ __('Sign out') }}
                        </button>
                    </form>
                @else
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('auth.login') }}">
                        {{ __('Sign in') }}
                    </a>
                    <a class="btn btn-sm btn-success ms-2" href="{{ route('auth.register') }}">
                        {{ __('Sign up') }}
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach($topics as $topic)
                <a class="p-2 link-secondary" href="{{ route('topic.details', $topic) }}">
                    {{ $topic->name }}
                </a>
            @endforeach
        </nav>
    </div>
</div>

@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            @foreach($posts as $post)
                @include('posts._item')
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection


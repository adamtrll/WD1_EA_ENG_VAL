@extends('layouts.main')

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => { console.log(editor) })
        .catch(error => { console.error(error) })
</script>
@endpush

@section('content')
<form action="{{ route('post.create') }}" method="POST">
    @csrf
    <div class="d-flex mb-5">
        <h4 class="display-4">{{ __('Publish') }}</h4>
        <button class="ms-auto btn btn-primary btn-lg">{{ __('Publish') }}</button>
    </div>
    <div class="row flex-md-row-reverse">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="topic_id">{{ __('Topic') }}</label>
                        <select name="topic_id" class="form-control">
                            <option>{{ __('Please choose a topic') }}</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">
                                    {{ $topic->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="alert alert-info mb-0">
                        {{ __('Save post to be able to add images') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <x-form.input name="title" label="{{ __('Title') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea id="editor" name="content" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

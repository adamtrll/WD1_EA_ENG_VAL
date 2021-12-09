@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    // todo inlin image https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/simple-upload-adapter.html
    ClassicEditor
        .create(document.querySelector('#editor'),{})
        .then(editor => { console.log(editor) })
        .catch(error => { console.error(error) })

    Dropzone.autoDiscover = false
    const myDropzone = new Dropzone('#image-upload', {
        headers: {
            'x-csrf-token': '{{ csrf_token() }}'
        },
        paramName: 'image',
        url: '{{ route("post.image", $post) }}',
    })

    myDropzone.on('completed', function() {
        //todo show uploded image and delete button
    })
</script>
@endpush

@section('content')
<form action="{{ route('post.image.delete', $post) }}" method="POST">
    @csrf
    <input type="submit" id="delete-image" class="d-none">
</form>
<form action="{{ route('post.edit', $post) }}" method="POST">
    @csrf
    <div class="d-flex mb-5">
        <h4 class="display-4">{{ __('Editing') }}: {{ $post->title }}</h4>
        <button class="ms-auto btn btn-primary btn-lg">{{ __('Update') }}</button>
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
                                <option value="{{ $topic->id }}" {{ $topic->id == $post->topic_id ? 'selected' : ''}}>
                                    {{ $topic->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    @if ($post->has_image)
                        <img class="img-fluid" src="{{ $post->cover_image }}" alt="" />
                        <label class="btn btn-danger" for="delete-image">
                            {{ __('Delete cover image') }}
                        </label>
                    @else
                    <div id="image-upload" class="dropzone"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <x-form.input name="title" label="{{ __('Title') }}" :value="$post->title" />
                    </div>
                    <div class="mb-3">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $post->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <textarea id="editor" name="content" class="form-control" rows="3">{{ old('content', $post->description) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

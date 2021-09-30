@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12 col-md-8 col-xl-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="display-4">
                    {{ __('Sign in') }}
                </h4>
            </div>
            <div class="card-body">
                @if($errors->count())
                    <div class="alert alert-danger pb-0">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="remember_me">
                            <label class="form-check-label" for="remember_me">{{ __('Rembember me') }}</label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg">
                            {{ __('Sign in') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

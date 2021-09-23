@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="display-4">{{ __('Sign up') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{ __('Full name') }}</label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email">{{ __('Email address') }}</label>
                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">{{ __('Password confirmation') }}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input
                                class="form-check-input{{ $errors->has('terms') ? ' is-invalid' : '' }}"
                                type="checkbox"
                                value="1"
                                name="terms"
                                id="terms"
                                {{ old('terms') ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="terms">
                                Agree to terms and conditions
                            </label>
                            @if ($errors->has('terms'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('terms') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg">
                            Sign up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

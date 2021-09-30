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
                        <x-form.input name="name" label="{{ __('Full name') }}" />
                    </div>
                    <div class="mb-3">
                        <x-form.input name="email" label="{{ __('Email address') }}" />
                    </div>
                    <div class="mb-3">
                        <x-form.input name="password" type="password" label="{{ __('Password') }}" />
                    </div>
                    <div class="mb-3">
                        <x-form.input name="password" type="password_confirmation" label="{{ __('Password confirmation') }}" />
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

@extends('/auth/main')

@section('title', 'Login to InstaDeck')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('instadeck.login') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <label for="email" class="col-md-10 col-form-label">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="password" class="col-md-10 col-form-label">{{ __('Password') }}</label>
                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center mb-0">
                            <div class="col-md-10 text-center">
                                <button type="submit" class="btn btn-primary w-100 d-block">
                                    {{ __('Login') }}
                                </button>
                                <hr>
                                <a href="{{ route('instadeck.register.form') }}" class="align-items-center">
                                    {{ __('Create an Account') }}
                                </a>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>window.onload = function () { document.querySelector("#email").focus(); }</script>
@endsection
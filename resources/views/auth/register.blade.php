@extends('/auth/main')

@section('title', 'Create InstaDeck Account')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('instadeck.register') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <label for="username" class="col-sm-12 col-form-label">{{ __('Username') }}</label>
                                <div class="col-sm-12">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="fullname" class="col-sm-12 col-form-label">{{ __('Full Name') }}</label>
                                <div class="col-sm-12">
                                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" autocomplete="fullname">
                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-12">
                                <label for="email" class="col-sm-12 col-form-label">{{ __('E-Mail Address') }}</label>
                                <div class="col-sm-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <label for="password" class="col-sm-12 col-form-label">{{ __('Password') }}</label>
                                <div class="col-sm-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="password-confirm" class="col-sm-12 col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="col-sm-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center mt-4 mb-0">
                            <div class="col-sm-12">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary w-100 d-block">
                                        {{ __('Register') }}
                                    </button>
                                    <hr>
                                    <a href="{{ route('instadeck.login.form') }}">
                                        {{ __('Already have an account? Login!') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>window.onload = function () { document.querySelector("#username").focus(); }</script>
@endsection
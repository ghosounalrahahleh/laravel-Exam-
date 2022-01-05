@extends('public-site.layouts.master')

@section('content')
<div id="particles-js"> </div>
<div class="container ">

    <div class="row justify-content-center align-items-start">
        <div class="loginContainer mt-3">
            <h1 class="headerLogin">Register</h1>
            <form method="POST" action="{{ route('register') }}" class=" pt-0 pb-4 p-5">
                @csrf

                <div class="row mb-3 flex-column m-auto ">
                    <label for="name" class="col-md-12 col-form-label text-md-start ">{{ __('Name') }}</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 flex-column m-auto ">
                    <label for="email" class="col-md-12 col-form-label text-md-start ">{{ __('E-Mail Address')
                        }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 flex-column m-auto ">
                    <label for="password" class="col-md-12 col-form-label text-md-start ">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 flex-column m-auto ">
                    <label for="password-confirm" class="col-md-12 col-form-label text-md-start ">{{ __('Confirm
                        Password') }}</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>
                <input type="hidden" name="role" value="2">
                <div class="row mb-0 justify-content-center">

                    <button type="submit" id="loginSubmit" class="mt-4 btn btn-primary">
                        {{ __('Register') }}
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection

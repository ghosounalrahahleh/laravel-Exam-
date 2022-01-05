@extends('public-site.layouts.master')

@section('content')
<div id="particles-js"> </div>

<div class="container ">

    <div class="row justify-content-center align-items-start">
            <div class="loginContainer mt-3">
                <h1 class="headerLogin">Login</h1>
                <form method="POST" action="{{ route('login') }}" class="p-5">
                    @csrf

                    <div class="row mb-3 flex-column m-auto ">
                        <label for="email" class="col-md-12 col-form-label text-md-start ">{{ __('E-Mail Address')
                            }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 flex-column m-auto ">
                        <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" >

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 ms-3 mt-2">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0 justify-content-center">

                            <button type="submit" id="loginSubmit" class="btn btn-primary mt-4">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link mt-2 " id="forget" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif

                    </div>
                </form>
            </div>

        </div>

</div>
@endsection

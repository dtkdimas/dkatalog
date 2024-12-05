<x-guest-layout>
    <section class="login-content">
        <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                <img src="{{ asset('assets/images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX"
                    alt="{{ __('images') }}">
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                            <div class="card-body z-3 px-md-0 px-lg-4">
                                <div href="{{ route('login') }}" class="navbar-brand d-flex align-items-center mb-3">

                                    <!--Logo start-->
                                    <div class="logo-main">
                                        <div class="logo-normal">
                                            <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="-0.757324" y="19.2427" width="28" height="4"
                                                    rx="2" transform="rotate(-45 -0.757324 19.2427)"
                                                    fill="currentColor" />
                                                <rect x="7.72803" y="27.728" width="28" height="4"
                                                    rx="2" transform="rotate(-45 7.72803 27.728)"
                                                    fill="currentColor" />
                                                <rect x="10.5366" y="16.3945" width="16" height="4"
                                                    rx="2" transform="rotate(45 10.5366 16.3945)"
                                                    fill="currentColor" />
                                                <rect x="10.5562" y="-0.556152" width="28" height="4"
                                                    rx="2" transform="rotate(45 10.5562 -0.556152)"
                                                    fill="currentColor" />
                                            </svg>
                                        </div>
                                        <div class="logo-mini">
                                            <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="-0.757324" y="19.2427" width="28" height="4"
                                                    rx="2" transform="rotate(-45 -0.757324 19.2427)"
                                                    fill="currentColor" />
                                                <rect x="7.72803" y="27.728" width="28" height="4"
                                                    rx="2" transform="rotate(-45 7.72803 27.728)"
                                                    fill="currentColor" />
                                                <rect x="10.5366" y="16.3945" width="16" height="4"
                                                    rx="2" transform="rotate(45 10.5366 16.3945)"
                                                    fill="currentColor" />
                                                <rect x="10.5562" y="-0.556152" width="28" height="4"
                                                    rx="2" transform="rotate(45 10.5562 -0.556152)"
                                                    fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!--logo End-->

                                    <h4 class="logo-title ms-3">{{ __('Hope UI') }}</h4>
                                </div>
                                <h2 class="mb-2 text-center">{{ __('Sign In') }}</h2>
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">{{ __('Email*') }}</label>
                                                <input type="email" class="form-control" id="email"
                                                    aria-describedby="email" placeholder=" " name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">{{ __('Password*') }}</label>
                                                <input type="password" class="form-control" id="password"
                                                    aria-describedby="password" placeholder=" " name="password" required
                                                    autocomplete="current-password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-between">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck1"
                                                    name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheck1">{{ __('Remember Me') }}</label>
                                            </div>
                                            <a
                                                href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary w-100">{{ __('Sign In') }}</button>
                                    </div>
                                    <p class="mt-3 text-center">
                                        {{ __('Don’t have an account?') }} <a href="{{ route('register') }}"
                                            class="text-underline">{{ __('Click here to sign up.') }}</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sign-bg">
                    <svg width="280" height="230" viewBox="0 0 431 398" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.05">
                            <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                            <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                            <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
                                transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                            <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

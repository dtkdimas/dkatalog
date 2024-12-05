<x-guest-layout>
    <section class="login-content vh-100">
        <div class="row m-0 align-items-center vh-100 bg-white h-100">
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                <img src="{{ asset('assets/images/auth/05.png') }}" class="img-fluid gradient-main animated-scaleX"
                    alt="{{ __('images') }}">
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                            <div class="card-body">
                                <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center mb-3">

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
                                </a>
                                <h2 class="mb-2 text-center">{{ __('Sign Up') }}</h2>
                                <p class="text-center">{{ __('Create your account.') }}</p>

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-left alert-success alert-dismissible fade show mb-3"
                                        role="alert">
                                        <span>{{ $message }}</span>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if ($message = Session::get('info'))
                                    <div class="alert alert-left alert-primary alert-dismissible fade show mb-3"
                                        role="alert">
                                        <span>{{ $message }}</span>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label">{{ __('Full Name*') }}</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder=" " name="name" value="{{ old('name') }}" required
                                                    autocomplete="name" autofocus>
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">{{ __('Email*') }}</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder=" " name="email" value="{{ old('email') }}"
                                                    required autocomplete="email">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password"
                                                    class="form-label">{{ __('Password*') }}</label>
                                                <input type="password" class="form-control" id="password"
                                                    placeholder=" " name="password" required
                                                    autocomplete="new-password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password_confirmation"
                                                    class="form-label">{{ __('Confirm Password*') }}</label>
                                                <input type="password" class="form-control"
                                                    id="password_confirmation" placeholder=" "
                                                    name="password_confirmation" required autocomplete="new-password">
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-5">
                                        <button type="submit"
                                            class="btn btn-primary w-100">{{ __('Sign Up') }}</button>
                                    </div>
                                    <p class="mt-3 text-center">
                                        {{ __('Already have an Account') }} <a href="{{ route('login') }}"
                                            class="text-underline">{{ __('Sign In') }}</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sign-bg sign-bg-right">
                    <svg width="280" height="230" viewBox="0 0 421 359" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.05">
                            <rect x="-15.0845" y="154.773" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 -15.0845 154.773)" fill="#3A57E8" />
                            <rect x="149.47" y="319.328" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 149.47 319.328)" fill="#3A57E8" />
                            <rect x="203.936" y="99.543" width="310.286" height="77.5714" rx="38.7857"
                                transform="rotate(45 203.936 99.543)" fill="#3A57E8" />
                            <rect x="204.316" y="-229.172" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(45 204.316 -229.172)" fill="#3A57E8" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
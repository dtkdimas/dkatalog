{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
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
                                <h2 class="mb-2 text-center">{{ __('Reset Password') }}</h2>
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">{{ __('Email*') }}</label>
                                                <input type="email" class="form-control" id="email"
                                                    aria-describedby="email" placeholder=" " name="email"
                                                    value="{{ old('email', $request->email) }}" required
                                                    autocomplete="email">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">{{ __('Password*') }}</label>
                                                <input type="password" class="form-control" id="password"
                                                    aria-describedby="password" placeholder=" " name="password" required
                                                    autocomplete="current-password" autofocus>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password"
                                                    class="form-label">{{ __('Confirm Password*') }}</label>
                                                <input id="password_confirmation" class="form-control"
                                                    type="password" name="password_confirmation" required
                                                    autocomplete="new-password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary w-100">{{ __('Reset') }}</button>
                                    </div>
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

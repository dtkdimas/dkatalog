<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Profile') }}
        </h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
            </ol>
        </nav>
    </x-slot>

    <div class="container py-12">
        <div class="row gap-6">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
            {{-- 
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>

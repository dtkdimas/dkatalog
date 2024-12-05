<x-app-layout>
    <x-slot name="header">
        <h1 class="h1">
            {{ __('Create User') }}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
            </ol>
        </nav>
    </x-slot>

    <div class="card p-5">
        <h3 class="h3 fw-bold mb-48">{{ __('Form Create User') }}</h3>
        <div class="">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name*') }}</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            id="name" required>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email*') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            id="email" required autocomplete="off">
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('Role*') }}</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="admin">{{ __('Admin') }}</option>
                            <option value="super_admin">{{ __('Super Admin') }}</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('role')" />
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">{{ __('Status*') }}</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                    </div>

                    <div class="mb-3">
                        <label for="avatar" class="form-label">{{ __('Avatar*') }}</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" required>
                        <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password*') }}</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password*') }}</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('users.index') }}" class="btn btn-light">{{ __('Back') }}</a>
                        <div class="d-flex gap-3">
                            <button type="reset" class="btn btn-outline-primary">{{ __('Reset') }}</button>
                            <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

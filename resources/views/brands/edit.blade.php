<x-app-layout>
    <x-slot name="header">
        <h1 class="h1">
            {{ __('Edit Brand') }}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">{{ __('Brands') }}</a></li>
                <li class="breadcrumb-item active max-text-20ch" aria-current="page">{{ __('Edit') }}
                    {{ $brand->brand_name }}</li>
            </ol>
        </nav>
    </x-slot>

    <div class="card p-5">
        <h3 class="h3 fw-bold mb-48">{{ __('Form Edit Brand') }}</h3>
        <div class="">
            <form action="{{ route('brands.update', $brand->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div class="mb-3">
                        <label for="brand_name" class="form-label">{{ __('Brand Name*') }}</label>
                        <input type="text" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}"
                            class="form-control" id="brand_name" required>
                        <x-input-error class="mt-2" :messages="$errors->get('brand_name')" />
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('brands.index') }}" class="btn btn-light">{{ __('Back') }}</a>
                        <div class="d-flex gap-3">
                            <button type="reset" class="btn btn-outline-primary">{{ __('Reset') }}</button>
                            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
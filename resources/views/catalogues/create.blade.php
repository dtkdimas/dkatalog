<x-app-layout>
    <x-slot name="header">
        <h1 class="h1">
            {{ __('Create Catalogue') }}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('catalogues.index') }}">{{ __('Catalogues') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
            </ol>
        </nav>
    </x-slot>

    <div class="card p-5">
        <h3 class="h3 fw-bold mb-48">{{ __('Form Create Catalogue') }}</h3>
        <div class="">
            <form action="{{ route('catalogues.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <div class="mb-3">
                        <label for="catalogue_name" class="form-label">{{ __('Catalogue Name*') }}</label>
                        <input type="text" name="catalogue_name" value="{{ old('catalogue_name') }}"
                            class="form-control" id="catalogue_name" required>
                        <x-input-error class="mt-2" :messages="$errors->get('catalogue_name')" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Size*') }}</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" value="300x250" required
                                {{ old('size') == '300x250' ? 'checked' : '' }}>
                            <label class="form-check-label">{{ __('300x250') }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" value="300x500" required
                                {{ old('size') == '300x500' ? 'checked' : '' }}>
                            <label class="form-check-label">{{ __('300x500') }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" value="1388x250" required
                                {{ old('size') == '1388x250' ? 'checked' : '' }}>
                            <label class="form-check-label">{{ __('1388x250') }}</label>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('size')" />
                    </div>

                    <div class="mb-3">
                        <label for="brand_id" class="form-label">{{ __('Brand*') }}</label>
                        <select name="brand_id" id="brand_id" class="form-select" required>
                            <option value="" selected disabled>{{ __('Select Brand') }}</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id', request('brand_id')) == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->brand_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('brand_id')" />
                    </div>

                    <div class="mb-3">
                        <label for="catalogue_banner" class="form-label">{{ __('Catalogue Banner*') }}</label>
                        <input type="url" name="catalogue_banner" class="form-control" id="catalogue_banner"
                            required>
                        <span>{{ __('Input using a CDN-hosted image URL') }}</span>
                        <x-input-error class="mt-2" :messages="$errors->get('catalogue_banner')" />
                    </div>

                    <div class="mb-3">
                        <label for="catalogue_url" class="form-label">{{ __('Catalogue URL*') }}</label>
                        <input type="url" name="catalogue_url" value="{{ old('catalogue_url') }}"
                            class="form-control" id="catalogue_url" required>
                        <x-input-error class="mt-2" :messages="$errors->get('catalogue_url')" />
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('catalogues.index') }}" class="btn btn-light">{{ __('Back') }}</a>
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
